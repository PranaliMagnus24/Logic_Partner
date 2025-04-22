<?php

namespace Modules\StateManagement\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\State;
use App\Models\Country;
use Yajra\DataTables\Facades\DataTables;

class StateManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    if ($request->ajax()) {
        $states = State::with('country')->orderBy('created_at', 'desc');

        return DataTables::eloquent($states)
            ->addIndexColumn()
            ->editColumn('name', function ($state) {
                return $state->name;
            })
            ->addColumn('country_name', function ($state) {
                return $state->country->name ?? '-';
            })
            ->filterColumn('country_name', function ($query, $keyword) {
                $query->whereHas('country', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })

            // Actions
            ->addColumn('action', function ($state) {
                return '
                <div class="d-flex align-items-center nowrap">
                 <a href="'.route('edit.state', $state->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                    <a href="' . route('delete.state', $state->id) . '" class="btn btn-danger delete-confirm me-1">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    $countries = Country::all();
    $state = null;
    return view('statemanagement::index', compact('countries', 'state'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statemanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
           'name' => 'required|string',
           'stamp_duty' => 'nullable|string',
        ]);
        State::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'country_code' => $request->country_code,
            'fips_code' => $request->fips_code,
            'iso2' => $request->iso2,
            'type' => $request->type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'flag' => $request->flag,
            'wikiDataId' => $request->wikiDataId,
            'stamp_duty' => $request->stamp_duty,
        ]);
        return redirect()->route('state.index')->with('success','State Created Successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('statemanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editState = State::findOrFail($id);
        $countries = Country::all();
        $states = State::all();
        return view('statemanagement::index', compact('states', 'editState','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'stamp_duty' => 'nullable|string',
        ]);

        $state = State::findOrFail($id);
        $state->update([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'country_code' => $request->country_code,
            'fips_code' => $request->fips_code,
            'iso2' => $request->iso2,
            'type' => $request->type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'flag' => $request->flag,
            'wikiDataId' => $request->wikiDataId,
            'stamp_duty' => $request->stamp_duty,
        ]);

        return redirect()->route('state.index')->with('success', 'State Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();
        return redirect()->route('state.index')->with('success','State deleted successfully');
    }
}
