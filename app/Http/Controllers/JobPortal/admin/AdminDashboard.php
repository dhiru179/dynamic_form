<?php

namespace App\Http\Controllers\jobPortal\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Controller
{
    public function index()
    {
        return view('job_portal.admin.index');
    }
}