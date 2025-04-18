<?php

namespace App\Http\Controllers\Admin\EnquiryManagement;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Enquiry;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class QuotationManagementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $quotations = Quotation::with('enquiry');

            return DataTables::eloquent($quotations)
                ->addIndexColumn()
                ->addColumn('enquiry_name', function($quotation) {
                    return $quotation->enquiry->enquiry_name ?? '-';
                })
                ->addColumn('action', function($quotation){
                    return '
                     <div class="d-flex align-items-center nowrap">
                        <a href="'.route('edit.quotation', $quotation->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                        <a href="'.route('delete.quotation', $quotation->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                         <div class="dropdown">
                                <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item view-quotation" href="#" data-id="'.$quotation->id.'">View Quotation</a></li>
                                </ul>
                            </div>
                            </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view("admin.quotation.index");
    }

    public function create(Request $request)
    {
        $enquiryId = $request->query('enquiry_id');
        $projectName = $request->query('project_name');
        $projectLocation = $request->query('project_location');

        return view('admin.quotation.create', compact('enquiryId', 'projectName', 'projectLocation'));
    }


    public function store(Request $request)
    {
        $request->validate([
         'enquiry_id' => 'required',
         'project_name' => 'required|string',
         'project_location' => 'required|string',
         'build_up_area' => 'required|string',
         'num_floors' => 'required|integer',
         'labor_cost' => 'required|integer',
         'material_cost' => 'required|integer',
         'equipment_cost' => 'required|integer',
         'misc_expenses' => 'required|string',
         'total_cost' => 'required|integer',
         'start_date' => 'required|date',
         'completion_date' => 'required|string',
         'status' => 'required|string',
        ]);

     $quotation = Quotation::create([
        'enquiry_id' =>$request->enquiry_id,
        'project_name' =>$request->project_name,
        'project_location' =>$request->project_location,
        'build_up_area' =>$request->build_up_area,
        'num_floors' =>$request->num_floors,
        'labor_cost' =>$request->labor_cost,
        'material_cost' =>$request->material_cost,
        'equipment_cost' =>$request->equipment_cost,
        'misc_expenses' =>$request->misc_expenses,
        'total_cost' =>$request->total_cost,
        'start_date' =>$request->start_date,
        'completion_date' =>$request->completion_date,
        'status' =>$request->status,
     ]);
     return redirect()->route('list.quotation')->with('success','Quotation created successfully');

    }

    public function edit(Request $request, $id){
        $quotation = Quotation::findOrFail($id);
        $enquiryId = $request->query('enquiry_id');
        return view('admin.quotation.edit',compact('quotation', 'enquiryId'));
    }

    public function update(Request $request, $id){
        $quotation = Quotation::findOrFail($id);
        $request->validate([
            'enquiry_id' => 'required',
            'project_name' => 'required|string',
            'project_location' => 'required|string',
            'build_up_area' => 'required|string',
            'num_floors' => 'required|integer',
            'labor_cost' => 'required|integer',
            'material_cost' => 'required|integer',
            'equipment_cost' => 'required|integer',
            'misc_expenses' => 'required|string',
            'total_cost' => 'required|integer',
            'start_date' => 'required|date',
            'completion_date' => 'required|string',
            'status' => 'required|string',
           ]);

        $quotation = Quotation::update([
           'enquiry_id' =>$request->enquiry_id,
           'project_name' =>$request->project_name,
           'project_location' =>$request->project_location,
           'build_up_area' =>$request->build_up_area,
           'num_floors' =>$request->num_floors,
           'labor_cost' =>$request->labor_cost,
           'material_cost' =>$request->material_cost,
           'equipment_cost' =>$request->equipment_cost,
           'misc_expenses' =>$request->misc_expenses,
           'total_cost' =>$request->total_cost,
           'start_date' =>$request->start_date,
           'completion_date' =>$request->completion_date,
           'status' =>$request->status,
        ]);
        return redirect()->route('list.quotation')->with('success','Quotation updated successfully');

    }


    public function destroy($id){
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();
        return redirect()->route('list.quotation')->with('success','Quotation deleted successfully');
    }


    public function show($id)
    {
        $quotation = Quotation::with('enquiry')->findOrFail($id);
        return response()->json([
            'html' => view('admin.quotation.view_quotation', compact('quotation'))->render()
        ]);
    }


}
