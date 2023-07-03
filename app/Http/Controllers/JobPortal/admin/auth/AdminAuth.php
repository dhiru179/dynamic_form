<?php

namespace App\Http\Controllers\jobPortal\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminAuth extends Controller
{
    public function signUp()
    {
        return view('job_portal.admin.signup');
    }
    public function storeAdminInfo(Request $request)
    {
        return view('job_portal.front.employer.signup');
    }
    public function login()
    {
        return ;
    }
    
    public function logout()
    {
        return false;
    }
}

