<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Profile;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $profile = Profile::first();
        return view('pages.rooms.index', compact('rooms','profile'));
    }

    public function show($name)
    {
        $room = Room::where('name', $name)->firstOrFail();
        $relatedRooms = Room::all();
        $profile = Profile::first();
        return view('pages.rooms.show', compact('room','profile', 'relatedRooms'));
    }
}
