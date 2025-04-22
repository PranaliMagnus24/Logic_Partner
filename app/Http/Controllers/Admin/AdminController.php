<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Quotation;



class AdminController extends Controller
{
    public function adminDashboard(Request $request)
    {
        $enquiryCount = Enquiry::count();
        $quotationCount = Quotation::count();
        $userCount = User::count();

        return view('admin.main', compact('enquiryCount', 'quotationCount', 'userCount'));
    }

    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        return view('main_admin.dashboard');
    }

    public function userProfile(){
        $user = auth()->user();
        return view('admin.profile.user_profile', compact('user'));
    }
}
