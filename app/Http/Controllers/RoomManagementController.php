<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Setting;
use App\Models\Facility;
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

    // 🔹 Tampilkan form tambah kamar
    public function create()
    {
        return view('admin.rooms.create');
    }

    // 🔹 Simpan data kamar baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rooms',
            'price' => 'required|integer',
            'size' => 'required|string',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('rooms', 'public');
        }

        Room::create($data);
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil ditambahkan!');
    }

    // 🔹 Tampilkan form edit kamar
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    // 🔹 Update data kamar
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:rooms,name,' . $room->id,
            'price' => 'required|integer',
            'size' => 'required|string',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('rooms', 'public');
        }

        $room->update($data);
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // 🔹 Hapus data kamar
    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil dihapus!');
    }
}
