<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Profile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        $contact = Contact::first();
        return view('admin.contacts.index', compact('contact', 'profile'));
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
        $request->validate([
            'address' => 'required|string|max:255',
            'business_hours' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'map_embed' => 'required|string',
        ]);

        $data = $request->only(['address', 'business_hours', 'email', 'phone', 'instagram', 'facebook', 'x', 'youtube', 'map_embed']);

        Contact::create($data);

        return redirect()
            ->back()
            ->with('success', 'Contact berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $contact = Contact::first();
        $request->validate([
            'address' => 'required|string|max:255',
            'business_hours' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'map_embed' => 'required|string',
        ]);

        $data = $request->only(['address', 'business_hours', 'email', 'phone', 'instagram', 'facebook', 'x', 'youtube', 'map_embed']);

        $contact->update($data);

        return redirect()
            ->back()
            ->with('success', 'Contact berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->back()
            ->with('success', 'Contact berhasil dihapus.');
    }
}
