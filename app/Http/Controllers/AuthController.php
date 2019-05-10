<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    function login(){
        return view('umum.login');
    }

    function postlogin(Request $request){
        if(Auth::attempt($request->only('user_id','password'))){
            return redirect('/admin');
        }else {
            return redirect()->back()->with('gagal','user id/password salah');

        }
    }
}
