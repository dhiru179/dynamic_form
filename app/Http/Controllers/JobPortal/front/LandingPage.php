<?php

namespace App\Http\Controllers\jobPortal\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LandingPage extends Controller
{
    public function landingPage()
    {
        return view('job_portal.front.landing');
    }

    
}

