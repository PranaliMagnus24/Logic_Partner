<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("index");
    }
    public function forgotPassword(){
        return view("forgot-password");
    }
}
