<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('login');
    }
    public function postLogin(LoginRequest $request){
    	$logina = array(
           'email'     => $request->txtUser,
           'password' => $request->txtPass,
           'level'    => 1
    	);
        $loginb = array(
           'email'     => $request->txtUser,
           'password' => $request->txtPass,
           'level'    => 2
        );
         $loginc = array(
           'email'     => $request->txtUser,
           'password' => $request->txtPass,
           'level'    => 0
        );
         $logind = array(
           'email'     => $request->txtUser,
           'password' => $request->txtPass,
           'level'    => 3
        );
        // return response()->json($login);
    	if(Auth::attempt($logina)){
    	return redirect()->intended('admin');
    }
    else if(Auth::attempt($loginb)){
        return redirect()->intended('driver');
    }
    else if(Auth::attempt($loginc)){
        return redirect()->intended('guest');
    }
    else if(Auth::attempt($logind)){
        return redirect()->intended('admin_station');
    }
    else {
    	return redirect()->back()->with(['fla_message'=>'Quý khách vui lòng xem lại thông tin tài khoản']);
    }

    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('login');

    }
   
}
