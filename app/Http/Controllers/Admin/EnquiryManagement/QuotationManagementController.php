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
        if ($request->ajax()){
         $users = User::query();
         return DataTables::eloquent($users)
         ->addIndexColumn()
         ->addColumn('created_at' , function($user){
            return Carbon::parse($user->created_at)->format('Y-m-d');
         })
         ->addColumn('action', function($user){
            return '
                  <a href="'.route('user.edit', $user->id).'" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                  <a href="'.route('user.delete', $user->id).'" class="btn btn-danger delete-confirm"><i class="bi bi-trash3-fill"></i></a>
            ';
         })
         ->rawColumns(['action'])
         ->make(true);
        };
        return view("admin.quotation.index");
    }

    public function create()
    {
        return view('admin.quotation.create');
    }

    public function store(Request $request)
    {

    }
}
