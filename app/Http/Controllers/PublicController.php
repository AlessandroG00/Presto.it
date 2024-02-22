<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {

        $announcements = Announcement::where('is_accepted',true)->orderBy('created_at','desc')->take(6)->get();
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category) {
        return view('categoryShow', compact('category'));
    }

    public function searchAnnouncements(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted',true)->orderBy('created_at','desc')->paginate(6);
        return view('announcement.index', compact('announcements'));
    }

    public function setLocale($lang) 
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

}
