<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Media;
use App\Models\Profile;
use App\Models\Facility;
use App\Models\RoomFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomManagementController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $profile = Profile::first();
        return view('admin.rooms.index', compact('rooms','profile'));
    }

    public function create()
    {
        $profile = Profile::first();
        return view('admin.rooms.create', compact('profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rooms',
            'price' => 'required|integer',
            'size' => 'required|string',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
            'media.*' => 'file|mimes:jpeg,png,jpg,mp4|max:20480',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('rooms', 'public');
        }
        $room = Room::create($data);
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $index => $file) {
                $filePath = $file->store('rooms', 'public');
                $type = $file->getMimeType() === 'video/mp4' ? 'video' : 'image';

                Media::create([
                    'room_id' => $room->id,
                    'file_url' => $filePath,
                    'type' => $type,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $profile = Profile::first();
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room', 'profile'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:rooms,name,' . $room->id,
            'price' => 'required|integer',
            'size' => 'required|string',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
            'media.*' => 'file|mimes:jpeg,png,jpg,mp4|max:20480',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->has('delete_media')) {
            foreach ($request->delete_media as $mediaId) {
                $media = Media::find($mediaId);
                if ($media && $media->room_id === $room->id) {
                    Storage::disk('public')->delete('rooms/' . basename($media->file_url));
                    $media->delete(); // Hapus dari database
                }
            }
        }

        if ($request->hasFile('cover_image')) {

            $data['cover_image'] = $request->file('cover_image')->store('rooms', 'public');
        }

        $room->update($data);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $index => $file) {
                $filePath = $file->store('rooms', 'public');
                $type = $file->getMimeType() === 'video/mp4' ? 'video' : 'image';

                Media::create([
                    'room_id' => $room->id,
                    'file_url' => $filePath,
                    'type' => $type,
                    'order' => $index,
                ]);
            }
        }
        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // 🔹 Hapus data kamar
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        foreach ($room->media as $media) {
            Storage::disk('public')->delete('rooms/' . basename($media->file_url));
            $media->delete(); // Hapus dari database
        }

        return redirect()->route('admin.rooms.index')->with('success', 'Data kamar berhasil dihapus!');
    }
}
