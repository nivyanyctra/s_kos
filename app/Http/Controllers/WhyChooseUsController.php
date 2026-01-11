<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $whyChooseUs = WhyChooseUs::orderBy('created_at', 'desc')->get();
        return view('admin.why.index', compact('whyChooseUs'));
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
        ]);

        WhyChooseUs::create($request->only(['title', 'description', 'icon']));

        return redirect()
            ->route('admin.why.index')
            ->with('success', 'Why Choose Us berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyChooseUs $whyChooseUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChooseUs $whyChooseUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyChooseUs $whyChooseUs)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
        ]);

        $whyChooseUs->update($request->only(['title', 'description', 'icon']));

        return redirect()
            ->route('admin.why.index')
            ->with('success', 'Why Choose Us berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChooseUs $whyChooseUs)
    {
        $whyChooseUs->delete();

        return redirect()
            ->route('admin.why.index')
            ->with('success', 'Why Choose Us berhasil dihapus.');
    }
}
