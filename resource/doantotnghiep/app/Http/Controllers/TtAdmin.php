<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use App\User;

class TtAdmin extends Controller
{
    public function getAdmin(){
    	$data = Admin::all();
    	$user = User::all();
    	return view('admin.ttadmin',['data'=>$data,'user'=>$user]);
    }
    public function postAdmin(Request $requests){
    	$phone = $requests->textPhone;
    	$gra = $requests->textgraduation;
    	// dump($phone);
    	Admin::changestt(1,$phone,$gra);
        return redirect()->route('ttadmin');

    }

}
