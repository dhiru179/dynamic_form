<?php

namespace App\Http\Controllers\jobPortal\front\employer\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployerAuth extends Controller
{
    public function signUp()
    {
        $result = DB::table('form_field')
        ->join('input_type','form_field.input_type_id','=','input_type.id')
        ->select('form_field.*','input_type.type')
        ->where(['form_field.form_id'=>36])->get();
        return view('job_portal.front.employer.signup',compact(['result']));
       
    }
    public function storeEmployerInfo(Request $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
 
        return redirect()->intended(RouteServiceProvider::HOME);
        return view('job_portal.front.employer.signup');
    }
    public function login()
    {
        $result = DB::table('form_field')
        ->join('input_type','form_field.input_type_id','=','input_type.id')
        ->select('form_field.*','input_type.type')
        ->where(['form_field.form_id'=>36])->get();
        return view('job_portal.front.employer.login',compact(['result']));
        
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
 