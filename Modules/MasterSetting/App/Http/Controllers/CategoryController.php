<?php

namespace Modules\MasterSetting\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MasterSetting\App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexCategory(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::orderBy('created_at', 'desc');
            return DataTables::eloquent($categories)
                ->addIndexColumn()
                ->addColumn('action', function($category){
                    return '
                     <div class="d-flex align-items-center nowrap">
                     <a href="'.route('category.edit', $category->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                     <a href="'.route('category.destroy', $category->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                     </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $editCategory = null;
        return view('mastersetting::category.index', compact('editCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCategory()
    {
        return view('mastersetting::category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'category_name' => 'required',
            'status' => 'required',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'status' => $request->status,
        ]);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('mastersetting::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $editCategory = Category::findOrFail($id);
        return view('mastersetting::category.index', compact('editCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'category_name' => 'required',
            'status' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'status' => $request->status,
        ]);
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
