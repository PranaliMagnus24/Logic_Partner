<?php

namespace Modules\FAQ\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\FAQ\App\Models\FAQ;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FAQ::all();
        $editFaq = null;
        return view('faq::index', compact('faqs','editFaq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faq::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
          'question' => 'required|string',
          'answer' => 'required|string',
          'status' => 'required|string',
        ]);

        $faq = FAQ::create([

            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'FAQ create successfully!');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('faq::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faqs = FAQ::all();
        $editFaq = FAQ::findOrFail($id);
        return view('faq::index', compact('faqs', 'editFaq'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'status' => 'required|string',
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }

}
