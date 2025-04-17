<?php

namespace Modules\CMSPages\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CMSPages\App\Models\Pages;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CMSPagesController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()){
            $pages = Pages::query();
            return DataTables::eloquent($pages)
            ->addIndexColumn()
            ->addColumn('action', function($page){
               return '
                     <a href="'.route('page.edit', $page->id).'" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                     <a href="'.route('page.destroy', $page->id).'" class="btn btn-danger delete-confirm"><i class="bi bi-trash3-fill"></i></a>
               ';
            })
            ->rawColumns(['action'])
            ->make(true);
           };
        return view('cmspages::index');
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
        $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'meta_title' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_img' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|string',
        ]);

        $page = Pages::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'status' => $request->status,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/pages/', $filename);
            $page->image = $filename;
        }

        // Handle OG image upload
        if ($request->hasFile('og_img')) {
            $file = $request->file('og_img');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/pages/', $filename);
            $page->og_img = $filename;
        }

        $page->save();
        return redirect()->back()->with('success', 'Page created successfully.');
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
        $request->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'meta_title' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_img' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|string',
        ]);

        $page = Pages::findOrFail($id);
        $page->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'status' => $request->status,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/pages/', $filename);
            $page->image = $filename;
        }

        // Handle OG image upload
        if ($request->hasFile('og_img')) {
            $file = $request->file('og_img');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move('upload/pages/', $filename);
            $page->og_img = $filename;
        }

        $page->save();
        return redirect()->route('page.index')->with('success', 'Page created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Pages::findOrFail($id);
        $page->delete();

        return redirect()->back()->with('success', 'Page deleted successfully!');
    }
}
