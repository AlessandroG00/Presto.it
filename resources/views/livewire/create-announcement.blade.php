<div>
  
  
    
  <div  class="text-center fw-bold">
    @if (session('message'))
  <div class="alert alert-success">
      {{ session('message') }}
  </div>
  @endif
</div>
  
    <div class="container form-custom mb-5 mt-5">
      <h1 class="text-center fw-bold mb-3">{{__('ui.creaIlTuoAnnuncio')}}</h1>
      <div class="row justify-content-center 100-hv">
        <div class="col-12 col-md-6">
          <form wire:submit="createAnnouncement">
            
            <div class="mb-3">
              <label for="inputTitle" class="form-label fw-bold fs-3">{{__('ui.titolo')}} </label>
              <input type="text" class="form-control"  aria-describedby="titlelHelp" wire:model.lazy ="title" placeholder="{{__('ui.Inserire-titolo')}}">
              @error('title')<span class="error is-invalid text-danger">{{$message}}</span> @enderror
            </div>
            
            <div class="mb-3">
              <label for="inputTitle" class="form-label fw-bold fs-3">{{__('ui.descrizione')}}</label>
              <textarea wire:model.lazy="body" type="text" class="form-control" cols="30" rows="10" placeholder="{{__('ui.Minimo-20-caratteri')}}"></textarea>
              @error('body')<span class="error is-invalid text-danger">{{$message}}</span> @enderror
            </div>
            
            <div class="mb-3">
              <label for="inputTitle" class="form-label fw-bold fs-3">{{__('ui.prezzo')}} </label>
              <input type="number" class="form-control"  wire:model.lazy="price" placeholder="">
              @error('price')<span class="error is-invalid text-danger">{{$message}}</span> @enderror
            </div>
            
            <div class="mb-3">
              <label for="Category" class="form-label fw-bold fs-3">{{__('ui.categoria')}}</label>
              <select id="inputCategory" class="form-control" wire:model.defer="category">
                  <option value="" class="">{{__('ui.Seleziona-una-categoria')}}</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{__("ui.$category->name")}}</option>
                  @endforeach
              </select>
              @error('category_id') <span class="error">{{ $message }}</span> @enderror
          </div>
          <div class="mb-3">
            <input type="file" wire:model="temporary_images" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="img" />
            @error('temporary_images.*') <span class="text-danger mt-2">{{ $message }}</span> @enderror
          </div>
            
          @if (!empty($images))
          <div class="row">
            <div class="col-12">
              <div class="row borderForm rounded shadow ">
                @foreach ($images as $key => $image)
                <div class="col my-3">
                  <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                  <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImages({{$key}})">{{__('ui.cancella')}}</button>
                </div>
                    
                @endforeach
              </div>
            </div>
          </div>
            
          @endif

            <div class="text-end p-3">
              <button type="submit" class="btn btn-dark shadow px-5 py-1 mt-3 mb-4">{{__('ui.crea')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>

