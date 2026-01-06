<?php

namespace App\Http\Controllers;

use App\Models\Principle;
use Illuminate\Http\Request;

class PrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
        $data = $request->only(['question', 'answer']);
        FrequentlyAskedQuestion::create($data);
        return redirect()
            ->back()
            ->with('success', 'Frequently Asked Question berhasil ditambahkan.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Principle $principle)
    {
        //
    }
}
