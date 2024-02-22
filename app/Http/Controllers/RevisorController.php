<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null) ->first();
        return view('revisor.index', compact ( 'announcement_to_check'));
    }
        public function acceptAnnouncement (Announcement $announcement){
            $announcement->setAccepted (true) ;
        return redirect()->back()->with( 'message', 'Complimenti, hai accettato l\'annuncio');

        }

        public function rejectAnnouncement (Announcement $announcement){

            $announcement->setAccepted (false) ;
        return redirect ()->back()->with('message',
        'Annuncio rifiutato');

        }
        //Funziona diventa revisore
        public function becomeRevisor()
        {
            Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
            return redirect ('/')->with('message','richiesta inoltrata');
        }
        
        public function makeRevisor(User $user)
        {
            Artisan::call('make:MakeUserRevisor', ["email"=>$user->email]);
            return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
        }
        
        public function lavoraIndex()
        {
            return view('lavora');
        }
    
} 