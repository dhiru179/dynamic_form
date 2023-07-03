<?php

namespace App\Http\Controllers\JobPortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Psy\Command\WhereamiCommand;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use stdClass;

class dashboard extends Controller
{

    function dashboard()
    {
        return view('job_portal.admin.dashboard');
    }

}