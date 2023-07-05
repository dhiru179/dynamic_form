<?php

namespace App\Http\Controllers\jobPortal\front\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class User extends Controller
{
    public function index()
    {
        return view('job_portal.front.user.index');
    }
  
}