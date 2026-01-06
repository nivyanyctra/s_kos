<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Profile;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        // $profile = Profile::first();
        // $bookings = Booking::with('room')->orderBy('created_at', 'desc')->get();
        // return view('admin.bookings.index', compact('bookings', 'profile'));
    }

    public function create()
    {
        // $profile = Profile::first();
        // $rooms = Room::orderBy('name')->get();
        // return view('admin.bookings.create', compact('profile', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'duration' => 'required|string|max:255',
        ]);

        $data = $request->only(['name', 'phone', 'email', 'duration']);

        Booking::create($data);

        return redirect()
            ->back()
            ->with('success', 'Book berhasil ditambahkan.');
    }

    public function edit(Booking $booking)
    {
        // $profile = Profile::first();
        // $rooms = Room::orderBy('name')->get();
        // return view('admin.bookings.edit', compact('booking', 'profile', 'rooms'));
    }

    public function update(Request $request, Booking $booking)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'phone' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255',
        //     'duration' => 'required|string|max:255',
        // ]);

        // $data = $request->only(['name', 'phone', 'email', 'duration']);

        // $booking->update($data);

        // return redirect()
        //     ->back()
        //     ->with('success', 'Book berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->back()
            ->with('success', 'Book berhasil dihapus.');
    }
}
