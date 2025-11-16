<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Setting;
use App\Models\Facility;
use App\Models\RoomFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomManagementController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $setting = Setting::first();
        return view('admin.rooms.index', compact('rooms','setting'));
    }

    public function create()
    {
        $setting = Setting::first();
        $facilities = Facility::all();
        return view('admin.rooms.create', compact('setting', 'facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rooms',
            'price' => 'required|integer',
            'size' => 'required|string',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('rooms', 'public');
        }

        $room = Room::create($data);
        // Attach room facilities
        foreach ($request->facilities ?? [] as $facilityId) {
            RoomFacility::create([
                'room_id' => $room->id,
                'facility_id' => $facilityId,
            ]);
        }
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $setting = Setting::first();
        $room = Room::findOrFail($id);
        $facilities = Facility::all();
        return view('admin.rooms.edit', compact('room', 'setting', 'facilities'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:rooms,name,' . $room->id,
            'price' => 'required|integer',
            'size' => 'required|string',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('rooms', 'public');
        }

        $room->update($data);
        // Update room facilities
        RoomFacility::where('room_id', $room->id)->delete();
        foreach ($request->facilities ?? [] as $facilityId) {
            RoomFacility::create([
                'room_id' => $room->id,
                'facility_id' => $facilityId,
            ]);
        }
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // 🔹 Hapus data kamar
    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil dihapus!');
    }
}
