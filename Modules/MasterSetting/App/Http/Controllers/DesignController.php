<?php

namespace Modules\MasterSetting\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MasterSetting\App\Models\Design;
use Yajra\DataTables\Facades\DataTables;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexDesign(Request $request)
    {
        if ($request->ajax()) {
            $designs = Design::orderBy('created_at', 'desc');
            return DataTables::eloquent($designs)
                ->addIndexColumn()
                ->addColumn('action', function($design){
                    return '
                     <div class="d-flex align-items-center nowrap">
                     <a href="'.route('design.edit', $design->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                     <a href="'.route('design.destroy', $design->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                     </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $editdesign = null;
        return view('mastersetting::design.design_index', compact('editdesign'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mastersetting::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDesign(Request $request): RedirectResponse
    {
        $request->validate([
            'design_name' => 'required',
            'status' => 'required',
        ]);

        Design::create([
            'design_name' => $request->design_name,
            'status' => $request->status,
        ]);
        return redirect()->route('design.index')->with('success', 'Design created successfully.');
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
    public function editDesign($id)
    {
        $designs = Design::all();
        $editdesign = Design::findOrFail($id);
        return view('mastersetting::design.design_index', compact('designs', 'editdesign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateDesign(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'design_name' => 'required',
            'status' => 'required',
        ]);

        $design = Design::findOrFail($id);
        $design->update([
            'design_name' => $request->design_name,
            'status' => $request->status,
        ]);
        return redirect()->route('design.index')->with('success', 'Design updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyDesign($id)
    {
        $design = Design::findOrFail($id);
        $design->delete();
        return redirect()->back()->with('success', 'Design deleted successfully!');
    }
}
