<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\TermsCondition;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        $term = TermsCondition::orderBy('created_at', 'desc')->first();
        // dd($term);
        return view('admin.terms.index', compact('term','profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'version' => 'required|string|max:50',
            'effective_date' => 'required|date',
            'content' => 'required',
        ]);
        $data = $request->only(['title', 'version', 'effective_date', 'content']);
        if ($request->has('is_active')) {
            TermsCondition::where('is_active', true)->update(['is_active' => false]);
        }

        TermsCondition::create($data);

        return redirect()->route('admin.terms.index')->with('status', 'Terms & Conditions created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $term = TermsCondition::where('is_active', true)->first();
        return view('pages.terms', compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TermsCondition $term)
    {
        return view('admin.terms.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TermsCondition $term)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'version' => 'required|string|max:50',
            'effective_date' => 'required|date',
            'content' => 'required',
        ]);
        $data = $request->only(['title', 'version', 'effective_date', 'content']);
        if ($request->has('is_active')) {
            TermsCondition::where('id', '!=', $term->id)->where('is_active', true)->update(['is_active' => false]);
        }

        $term->update($data);
        $is_active = $request->has('is_active') ? true : false;
        $term->update(['is_active' => $is_active]);

        return redirect()->route('admin.terms.index')->with('status', 'Terms & Conditions updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TermsCondition $term)
    {
        $term->delete();
        return redirect()->route('admin.terms.index')->with('status', 'Terms & Conditions deleted successfully.');
    }
}
