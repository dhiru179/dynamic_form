<?php

namespace App\Http\Controllers\jobPortal\front\user\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersAuth extends Controller
{
    public function signUp()
    {
        $result = DB::table('form_field')
            ->join('input_type', 'form_field.input_type_id', '=', 'input_type.id')
            ->select('form_field.*', 'input_type.type')
            ->where(['form_field.form_id' => 36])->get();
        return view('job_portal.front.user.signup', compact(['result']));
    }
    public function storeUserInfo(Request $request)
    {
        return false;
    }
    public function login()
    {
        $result = DB::table('form_field')
            ->join('input_type', 'form_field.input_type_id', '=', 'input_type.id')
            ->select('form_field.*', 'input_type.type')
            ->where(['form_field.form_id' => 36])->get();
        return view('job_portal.front.user.login', compact(['result']));
    }
    public function loginPost(Request $request)
    {
        // return $request->all();
        $credentials = [
            'user_id' => $request->user_id,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('landing_page');
        }
        return "user";
    }


    public function logout(Request $request)
    {
        $request->session()->invalidate();
        // return $request->all();
        // dd(auth());
        Auth::logout();
        
        return redirect('/');
    }
}
