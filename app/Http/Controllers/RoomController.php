<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Room;
use App\Models\Profile;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $profile = Profile::first();
        $contact = Contact::first();
        return view('pages.rooms.index', compact('rooms','profile', 'contact'));
    }

    public function show($slug)
    {
        $room = Room::where('slug', $slug)->firstOrFail();
        $relatedRooms = Room::all();
        $profile = Profile::first();
        $contact = Contact::first();
        return view('pages.rooms.show', compact('room','profile', 'relatedRooms', 'contact'));
    }
}
