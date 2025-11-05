<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityManagementController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $facilities = Facility::orderBy('created_at', 'desc')->get();
        
        return view('admin.facilities.index', compact('facilities', 'setting'));
    }

    public function create()
    {
        $setting = Setting::first();
        return view('admin.facilities.create', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2040',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('facilities', 'public');
        }

        Facility::create($data);

        return redirect()
            ->route('facilities.index')
            ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Facility $facility)
    {
        $setting = Setting::first();
        return view('admin.facilities.edit', compact('facility', 'setting'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2040',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
                Storage::disk('public')->delete($facility->image_path);
            }

            $data['image_path'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($data);

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
            Storage::disk('public')->delete($facility->image_path);
        }

        $facility->delete();

        return redirect()
            ->route('facilities.index')
            ->with('success', 'Fasilitas berhasil dihapus.');
    }
}
