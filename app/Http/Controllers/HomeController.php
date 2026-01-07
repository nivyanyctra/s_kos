<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $profile = Profile::first();
        $featuredRooms = Room::with('facilities')
                        // ->where('is_featured', true)
                        ->where('status', 'available')
                        ->orderBy('price', 'asc')
                        ->take(3)
                        ->get();
        return view('index', compact('profile', 'featuredRooms'));
    }
    public function about()
    {
        $profile = Profile::first();
        return view('pages.about', compact('profile'));
    }
    public function contact()
    {
        $profile = Profile::first();
        return view('pages.contact', compact('profile'));
    }
}
