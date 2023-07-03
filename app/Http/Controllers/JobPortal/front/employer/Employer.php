<?php

namespace App\Http\Controllers\jobPortal\front\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Employer extends Controller
{
    public function dashboard()
    {
        return view('job_portal.front.employer.dashboard');
    }
    public function adPost()
    {
        return view('job_portal.front.employer.adpost');
    }
    public function postList()
    {
        return view('job_portal.front.employer.posts');
    }
}