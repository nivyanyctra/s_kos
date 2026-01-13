<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;
use App\Models\Profile;

class FrequentlyAskedQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        $faq = FrequentlyAskedQuestion::all();
        return view('admin.faqs.index', compact('profile', 'faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
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
            ->route('admin.faq.index')
            ->with('success', 'Frequently Asked Question berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FrequentlyAskedQuestion $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FrequentlyAskedQuestion $faq)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FrequentlyAskedQuestion $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
        
        $data = $request->only(['question', 'answer']);
        $faq->update($data);
        return redirect()
            ->back()
            ->with('success', 'Frequently Asked Question berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrequentlyAskedQuestion $faq)
    {
        $faq->delete();
        return redirect()
            ->back()
            ->with('success', 'Frequently Asked Question berhasil dihapus.');
    }
}
