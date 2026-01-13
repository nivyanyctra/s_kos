<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Principle;
use Illuminate\Http\Request;

class PrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        $principles = Principle::all();
        return view('admin.principles.index', compact('profile', 'principles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.principles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);
        $data = $request->only(['title', 'description', 'icon']);
        Principle::create($data);
        return redirect()
            ->route('admin.principle.index')
            ->with('success', 'Principle berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Principle $principle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Principle $principle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Principle $principle)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);
        $data = $request->only(['title', 'description', 'icon']);
        $principle->update($data);
        return redirect()
            ->back()
            ->with('success', 'Principle berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Principle $principle)
    {
        $principle->delete();
        return redirect()
            ->route('admin.principle.index')
            ->with('success', 'Principle berhasil dihapus.');
    }
}
