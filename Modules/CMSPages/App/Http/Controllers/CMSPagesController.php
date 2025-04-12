<?php

namespace Modules\CMSPages\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CMSPages\App\Models\Pages;

class CMSPagesController extends Controller
{

    public function index()
    {
        $pages = Pages::all();
        return view('cmspages::index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cmspages::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('cmspages::show');
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit($id)
    {
        $pages = Pages::all();
        $editPages = Pages::findOrFail($id);
        return view('cmspages::index', compact('pages', 'editPages'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
