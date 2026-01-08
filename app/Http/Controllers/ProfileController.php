<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profiles.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $profile = Profile::first();
        $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'description' => 'required|string',
            'story' => 'required|string',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_path' => 'nullable|mimes:mp4,avi,mov,wmv|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo_path')) {
            if ($profile->logo_path) {
                Storage::disk('public')->delete($profile->logo_path);
            }
            $data['logo_path'] = $request->file('logo_path')->store('profiles', 'public');
        }
        if ($request->hasFile('photo_path')) {
            if ($profile->photo_path) {
                Storage::disk('public')->delete($profile->photo_path);
            }
            $data['photo_path'] = $request->file('photo_path')->store('profiles', 'public');
        }
        if ($request->hasFile('video_path')) {
            if ($profile->video_path) {
                Storage::disk('public')->delete($profile->video_path);
            }
            $data['video_path'] = $request->file('video_path')->store('profiles', 'public');
        }
        $profile->update($data);
        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
