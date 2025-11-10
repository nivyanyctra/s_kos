<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Setting;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $setting = Setting::first();
        return view('pages.rooms.index', compact('rooms','setting'));
    }

    public function show($name)
    {
        $room = Room::where('name', $name)->firstOrFail();
        $setting = Setting::first();
        return view('pages.rooms.show', compact('room','setting'));
    }
}
