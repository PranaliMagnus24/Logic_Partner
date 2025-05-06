<?php

namespace App\Http\Controllers\Admin\EnquiryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Property;

class EnquiryManagementController extends Controller
{
    ///Enquiry list
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $enquiries = Enquiry::with('properties')->orderBy('created_at', 'desc');
            return DataTables::eloquent($enquiries)
                ->addIndexColumn()
                ->addColumn('project_name', function($quotation) {
                    return $quotation->properties->project_name ?? '-';
                })
                // Filter by properties name
                ->filterColumn('project_name', function($query, $keyword) {
                    $query->whereHas('properties', function($q) use ($keyword) {
                        $q->where('project_name', 'like', "%{$keyword}%");
                    });
                })
                ->addColumn('action', function($enquiry) {
                    return '
                        <div class="d-flex align-items-center nowrap">
                            <a href="'.route('edit.enquiry', $enquiry->id).'" class="btn btn-primary me-1"><i class="bi bi-pencil-square"></i></a>
                            <a href="'.route('delete.enquiry', $enquiry->id).'" class="btn btn-danger delete-confirm me-1"><i class="bi bi-trash3-fill"></i></a>
                            <div class="dropdown">
                                <a class="icon btn btn-secondary" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item view-enquiry" href="#" data-id="'.$enquiry->id.'">View Enquiry</a></li>
                                    <li><a class="dropdown-item" href="'.route('create.quotation', [
                                        'enquiry_id' => $enquiry->id,
                                        'project_name' => $enquiry->project_name,
                                        'project_location' => $enquiry->project_location
                                        ]).'">Create Quotation
                                        </a>
                                        </li>
                                </ul>
                            </div>
                             <a href="'.route('enquiry.pdf', $enquiry->id).'" class="btn btn-warning me-1" onclick="generatePDF({{ $enquiry->id }})">  <i class="bi bi-file-earmark-pdf"></i></a>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $enquiry = null;
        return view("admin.enquiry_management.index_enquiry", compact("enquiry"));
    }
   ////Create Enquiry

    public function createEnquiry()
    {
         $users = User::all();
         $properties = Property::where('status', 'available')->get();
        return view('admin.enquiry_management.create_enquiry', compact('users', 'properties'));
    }


    ////Store Enquiry
    public function storeEnquiry(Request $request)
    {
        $request->validate([
            'assign_to' => 'required|array',
            'project_name' => 'required|string',
            'project_location' => 'required|string',
            'customer_name' => 'required|string',
            'second_customer_name' => 'nullable|string',
            'enquiry_name' => 'required|string',
            'stage' => 'required|string',
            'status' => 'required|string',
            'follow_up_date' => 'required|date',
            'follow_up_time' => 'required',
            'report_name' => 'required|string',
            'current_stage_date' => 'required|date',
            'created_date' => 'required|date',
            'enquiry_type' => 'required|string',
            'enquiry_source' => 'required|string',
            'best_time_to_call' => 'required|string',
            'attachments' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

        ]);

        $isDraft = $request->submission_type === 'draft' ? 1 : 0;
        $enquiry = Enquiry::create([
            'project_name' => $request->project_name,
            'project_location' => $request->project_location,
            'customer_name' => $request->customer_name,
            'second_customer_name' => $request->second_customer_name,
            'enquiry_name' => $request->enquiry_name,
            'stage' => $request->stage,
            'status' => $request->status,
            'follow_up_date' => $request->follow_up_date,
            'follow_up_time' => $request->follow_up_time,
            'report_name' => $request->report_name,
            'current_stage_date' => $request->current_stage_date,
            'created_date' => $request->created_date,
            'enquiry_type' => $request->enquiry_type,
            'enquiry_source' => $request->enquiry_source,
            'best_time_to_call' => $request->best_time_to_call,
            'assign_to' => json_encode($request->assign_to),
            'is_draft' => $isDraft,
        ]);
        if ($request->hasFile('attachments')) {
            $file = $request->file('attachments');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/attachments/'), $filename);
            $enquiry->update(['attachments' => $filename]);
        }

        return redirect()->route('list.enquiry')->with('success', 'Enquiry created successfully!');
    }


    ///Edit Enquiry
    public function editEnquiry($id)
    {

        $enquiry = Enquiry::findOrFail($id);
        $users = User::all();
        $selectedUsers = json_decode($enquiry->assign_to, true) ?? [];
        $properties = Property::where('status', 'available')->get();

        return view('admin.enquiry_management.edit_enquiry', compact('enquiry','users','selectedUsers', 'properties'));
    }

/////Update Enquiry
    public function updateEnquiry(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $request->validate([
            'assign_to' => 'required|array',
            'project_name' => 'required|string',
            'project_location' => 'required|string',
            'customer_name' => 'required|string',
            'second_customer_name' => 'nullable|string',
            'enquiry_name' => 'required|string',
            'stage' => 'required|string',
            'status' => 'required|string',
            'follow_up_date' => 'required|date',
            'follow_up_time' => 'required',
            'report_name' => 'required|string',
            'current_stage_date' => 'required|date',
            'created_date' => 'required|date',
            'enquiry_type' => 'required|string',
            'enquiry_source' => 'required|string',
            'best_time_to_call' => 'required|string',
            'attachments' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

        ]);

        $isDraft = $request->submission_type === 'draft' ? 1 : 0;
        $enquiry->update([
           'project_name' => $request->project_name,
            'project_location' => $request->project_location,
            'customer_name' => $request->customer_name,
            'second_customer_name' => $request->second_customer_name,
            'enquiry_name' => $request->enquiry_name,
            'stage' => $request->stage,
            'status' => $request->status,
            'follow_up_date' => $request->follow_up_date,
            'follow_up_time' => $request->follow_up_time,
            'report_name' => $request->report_name,
            'current_stage_date' => $request->current_stage_date,
            'created_date' => $request->created_date,
            'enquiry_type' => $request->enquiry_type,
            'enquiry_source' => $request->enquiry_source,
            'best_time_to_call' => $request->best_time_to_call,
            'assign_to' => json_encode($request->assign_to),
            'is_draft' => $isDraft,
        ]);
        if ($request->hasFile('attachments')) {
            $file = $request->file('attachments');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/attachments/'), $filename);
            $enquiry->update(['attachments' => $filename]);
        }
        return redirect()->route('list.enquiry')->with('success', 'Enquiry updated successfully!');
    }


    ////Delete Enquiry
    public function deleteEnquiry($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->route('list.enquiry')->with('success', 'Enquiry deleted successfully!');
    }


    public function showEnquiry($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return response()->json([
            'html' => view('admin.enquiry_management.view_enquiry', compact('enquiry'))->render()
        ]);
    }


    public function preview(Request $request)
    {
        $data = $request->all();
        return view('admin.enquiry_management.preview_enquiry', compact('data',));
    }

    public function generatePDF($id)
    {
        $enquiry = Enquiry::with('quotations')->findOrFail($id);

        $pdf = Pdf::loadView('admin.pdf.enquiry_pdf', compact('enquiry'));

        return $pdf->stream('enquiry_' . $enquiry->id . '.pdf');
    }


    public function getPropertyDetails($id)
{
    $property = Property::find($id);

    if ($property) {
        return response()->json([
            'property_address' => $property->property_address,
            'stage' => $property->stage
        ]);
    }
    return response()->json(['error' => 'Property not found'], 404);
}

}
