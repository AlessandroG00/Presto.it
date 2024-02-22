<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth')->except('welcome', 'showAnnouncement','indexAnnouncement',);
        
    }

    public function create() {
        return view('announcement.create');
    }

    public function showAnnouncement(Announcement $announcement){

        return view('announcement.show', compact('announcement'));
        
    }
    public function indexAnnouncement(){
        //! quanti ne vogliamo vedere sulla pagina
        $announcements=Announcement::where('is_accepted',true)->orderBy('created_at','desc')->paginate(6);
        return view('announcement.index', compact('announcements'));
        
    }
} 
