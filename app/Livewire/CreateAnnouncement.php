<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images= [];
    public $image;
    public $form_id;
    public $announcement;




    protected $rules = [
        'title'=>'required|min:6',
        'body'=>'required|min:8',
        'category'=>'required',
        'price'=>'required|numeric',
        'images.*' =>'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ];

    protected $messages = [
        'required'=> 'Il campo è richiesto',
        'min'=>'Il campo è troppo corto',
        'temporary_images_required' => 'L\'immagine è richiesta',
        'temporary_image.*.image' =>'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo di 1mb',
        'images.image' => 'L\'immagine deve essere un\'immagine',
        'images.max' => 'L\'immagine deve essere massimo di 1mb',
        'numeric'=>'Il campo deve essere un numero',
        'category'=>'Il campo è richiesto',
    ];


    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    
    public function removeImages($key)
    {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
    
    public function createAnnouncement()
    {
        $this->validate();
        
        $this->announcement=Category::find($this->category)->announcements()->create($this->validate());
        
        if (count($this->images)){
            foreach($this->images as $image){
                // $this->announcement->images()->create(['path'=>$image->store('public/img')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName , 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 300 , 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),

                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        $this->announcement->user()->associate(Auth::user());

        $this->announcement->save();

        $this->clean();
        return redirect(route('welcome'))->with('message','l\'articolo sarà aggiunto dopo la revisione!');
    }

    /* public function createAnnouncement(){

        
        $category=Category::find($this->category);
        
        $announcement= $category->announcements()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
            'category'=> $this->category,
            'user_id'=>Auth::user()->id,
        ]); */
        
        
        /* $this->clean();
        return redirect(route('welcome'))->with('message','Aggiunto correttamente');
    } */

    public function clean()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->image = '';
        $this->images = [];
        $this->temporary_images = [];
        

    }

    // Segnale errore usiamo .lazy
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
