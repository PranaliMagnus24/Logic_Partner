<?php

namespace Modules\MasterSetting\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MasterSetting\App\Models\Contract;
use Yajra\DataTables\Facades\DataTables;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contracts = Contract::orderBy('created_at', 'desc');
            return DataTables::eloquent($contracts)
                ->addIndexColumn()
                ->addColumn('action', function($contract){
                    return '
                     <div class="d-flex align-items-center nowrap">
                     <a href="'.route('contract.edit', $contract->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                     <a href="'.route('contract.destroy', $contract->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                     </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $editcontract = null;
        return view('mastersetting::contract.index', compact('editcontract'));
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'contract_type_name' => 'required',
            'status' => 'required',
        ]);

        Contract::create([
            'contract_type_name' => $request->contract_type_name,
            'status' => $request->status,
        ]);
        return redirect()->route('contract.index')->with('success', 'Contract created successfully.');
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
        $contracts = Contract::all();
        $editcontract = Contract::findOrFail($id);
        return view('mastersetting::contract.index', compact('contracts', 'editcontract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'contract_type_name' => 'required',
            'status' => 'required',
        ]);

        $contract = Contract::findOrFail($id);
        $contract->update([
            'contract_type_name' => $request->contract_type_name,
            'status' => $request->status,
        ]);
        return redirect()->route('contract.index')->with('success', 'Contract updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return redirect()->back()->with('success', 'Contract deleted successfully!');
    }
}
