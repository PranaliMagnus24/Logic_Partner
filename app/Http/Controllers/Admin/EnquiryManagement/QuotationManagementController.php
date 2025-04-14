<?php

namespace App\Http\Controllers\Admin\EnquiryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Quotation;
use App\Http\Models\Enquiry;


class QuotationManagementController extends Controller
{
    public function index()
    {
        return view('admin.quotation.index');
    }

    public function create()
    {
        return view('admin.quotation.create');
    }

    public function store(Request $request)
    {

    }
}
