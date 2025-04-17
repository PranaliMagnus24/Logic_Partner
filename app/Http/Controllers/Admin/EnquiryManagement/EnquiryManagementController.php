<?php

namespace App\Http\Controllers\Admin\EnquiryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class EnquiryManagementController extends Controller
{
    ///Enquiry list
//    public function index1(Request $request)
//    {
//        $enquiries = Enquiry::query();

//        if (request()->has('search')) {
//         $searchTerm = request('search');
//         $enquiries->where(function($query) use ($searchTerm) {
//             $query->where('project_name', 'like', '%' . $searchTerm . '%')
//                   ->orWhere('customer_name', 'like', '%' . $searchTerm . '%')
//                   ->orWhere('customer_email', 'like', '%' . $searchTerm . '%');
//         });
//     }
//        $enquiries = $enquiries->orderBy('created_at', 'desc')->paginate(10);
//      return view('admin.enquiry_management.index_enquiry', compact('enquiries'));
//    }


   public function index(Request $request){

    if ($request->ajax()){
        $enquiries = Enquiry::query();
        return DataTables::eloquent($enquiries)
        ->addIndexColumn()
        ->addColumn('action', function($enquiry){
           return '
                 <a href="'.route('edit.enquiry', $enquiry->id).'" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                 <a href="'.route('delete.enquiry', $enquiry->id).'" class="btn btn-danger delete-confirm"><i class="bi bi-trash3-fill"></i></a>
           ';
        })
        ->rawColumns(['action'])
        ->make(true);
       };
       return view("admin.enquiry_management.index_enquiry");

   }
   ////Create Enquiry

    public function createEnquiry()
    {
         $users = User::all();
        return view('admin.enquiry_management.create_enquiry', compact('users'));
    }


    ////Store Enquiry
    public function storeEnquiry(Request $request)
    {
        $request->validate([
            'assign_to' => 'required|array',
            'project_name' => 'required|string',
            'project_location' => 'required|string',
            'estimated_budget' => 'required|string',
            'estimated_timeline' => 'required|string',
            'customer_name' => 'required|string',
            'customer_email' => 'required|string|email|max:255|unique:users,email',
            'customer_phone' => 'required|integer|digits:10',
            'customer_address' => 'required|string',
        ]);

        $enquiry = Enquiry::create([
            'project_name' => $request->project_name,
            'project_location' => $request->project_location,
            'estimated_budget' => $request->estimated_budget,
            'estimated_timeline' => $request->estimated_timeline,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'assign_to' => json_encode($request->assign_to),
        ]);

        return redirect()->route('list.enquiry')->with('success', 'Enquiry created successfully!');
    }


    ///Edit Enquiry
    public function editEnquiry($id)
    {

        $enquiry = Enquiry::findOrFail($id);
        $users = User::all();
        $selectedUsers = json_decode($enquiry->assign_to, true) ?? [];

        return view('admin.enquiry_management.edit_enquiry', compact('enquiry','users','selectedUsers'));
    }

/////Update Enquiry
    public function updateEnquiry(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required|string',
            'project_location' => 'required|string',
            'estimated_budget' => 'required|string',
            'estimated_timeline' => 'required|string',
            'customer_name' => 'required|string',
            'customer_email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'customer_phone' => 'required|integer|digits:10',
            'customer_address' => 'required|string',
        ]);
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update([
            'project_name' => $request->project_name,
            'project_location' => $request->project_location,
            'estimated_budget' => $request->estimated_budget,
            'estimated_timeline' => $request->estimated_timeline,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'assign_to' => json_encode($request->assign_to),
        ]);
        return redirect()->route('list.enquiry')->with('success', 'Enquiry updated successfully!');
    }


    ////Delete Enquiry
    public function deleteEnquiry($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->route('list.enquiry')->with('success', 'Enquiry deleted successfully!');
    }

}
