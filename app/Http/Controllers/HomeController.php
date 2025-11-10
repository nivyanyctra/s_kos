<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Setting;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $setting = Setting::first();
        $featuredRooms = Room::with('facilities')
                        // ->where('is_featured', true)
                        ->where('status', 'available')
                        ->orderBy('price', 'asc')
                        ->take(3)
                        ->get();
        return view('index', compact('setting', 'featuredRooms'));
    }
    public function about()
    {
        $setting = Setting::first();
        return view('pages.about', compact('setting'));
    }
    public function contact()
    {
        $setting = Setting::first();
        return view('pages.contact', compact('setting'));
    }
}
