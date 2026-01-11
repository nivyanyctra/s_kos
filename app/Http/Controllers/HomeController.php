<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Room;
use App\Models\User;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Facility;
use App\Models\Principle;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $profile = Profile::first();
        $contact = Contact::first();
        $featuredRooms = Room::with('facilities')
                        // ->where('is_featured', true)
                        ->where('status', 'available')
                        ->orderBy('price', 'asc')
                        ->take(3)
                        ->get();
        $whychooseuss = WhyChooseUs::all();
        $testimonials = Testimonial::all();
        return view('index', compact('profile', 'contact', 'featuredRooms', 'whychooseuss', 'testimonials'));
    }
    public function about()
    {
        $profile = Profile::first();
        $principles = Principle::all();
        $testimonials = Testimonial::all();
        $contact = Contact::first();
        return view('pages.about', compact('profile', 'principles', 'testimonials', 'contact'));
    }
    public function contact()
    {
        $profile = Profile::first();
        return view('pages.contact', compact('profile'));
    }
}
