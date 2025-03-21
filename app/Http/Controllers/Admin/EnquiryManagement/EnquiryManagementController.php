<?php

namespace App\Http\Controllers\Admin\EnquiryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryManagementController extends Controller
{
   public function index(Request $request)
   {
       $enquiries = Enquiry::query();

       if (request()->has('search')) {
        $searchTerm = request('search');
        $enquiries->where(function($query) use ($searchTerm) {
            $query->where('project_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('customer_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('customer_email', 'like', '%' . $searchTerm . '%');
        });
    }
       $enquiries = $enquiries->orderBy('created_at', 'desc')->paginate(10);
     return view('admin.enquiry_management.index_enquiry', compact('enquiries'));
   }

    public function createEnquiry()
    {
        return view('admin.enquiry_management.create_enquiry');
    }

    public function storeEnquiry(Request $request)
    {
        $request->validate([
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
        ]);

        return redirect()->route('list.enquiry')->with('success', 'Enquiry created successfully!');
    }

    public function editEnquiry($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('admin.enquiry_management.edit_enquiry', compact('enquiry'));
    }


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
        ]);
        return redirect()->route('list.enquiry')->with('success', 'Enquiry updated successfully!');
    }


    public function deleteEnquiry($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->route('list.enquiry')->with('success', 'Enquiry deleted successfully!');
    }

}
