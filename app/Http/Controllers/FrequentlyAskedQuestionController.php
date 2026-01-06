<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FrequentlyAskedQuestionController extends Controller
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
    public function show(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
        $data = $request->only(['question', 'answer']);
        $frequentlyAskedQuestion->update($data);
        return redirect()
            ->back()
            ->with('success', 'Frequently Asked Question berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        $frequentlyAskedQuestion->delete();
        return redirect()
            ->back()
            ->with('success', 'Frequently Asked Question berhasil dihapus.');
    }
}
