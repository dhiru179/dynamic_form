<?php

namespace App\Http\Controllers\adhoards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{

    public function login()
    {
        return view('adhoards.auth.login');
    }
    public function register()
    {
        return view('adhoards.auth.register');
    }
    public function checkUserStatus()
    {
        // here check user block or not

        return "let us assume user not block";

    }
}