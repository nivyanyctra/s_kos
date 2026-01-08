<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    /**
     * Display the form for editing the privacy policy.
     */
    public function index()
    {
        $profile = Profile::first();
        $privacy = PrivacyPolicy::orderBy('created_at', 'desc')->first();
        return view('admin.privacy.index', compact('privacy', 'profile'));
    }

    /**
     * Update the privacy policy in storage.
     */
    public function update(Request $request, PrivacyPolicy $privacy)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'version' => 'required|string|max:50',
            'effective_date' => 'required|date',
            'content' => 'required',
        ]);
        $data = $request->only(['title', 'version', 'effective_date', 'content']);
        if ($request->has('is_active')) {
            PrivacyPolicy::where('id', '!=', $privacy->id)->where('is_active', true)->update(['is_active' => false]);
        }

        $privacy->update($data);
        $is_active = $request->has('is_active') ? true : false;
        $privacy->update(['is_active' => $is_active]);

        return redirect()->route('admin.privacy.index')->with('status', 'Privacy Policy updated successfully.');
    }
}
