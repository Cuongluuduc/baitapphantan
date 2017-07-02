<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;

class NewController extends Controller
{
   public function getnew(){
   	return view('admin.tintuc');
   } 
   public function postnew(Request $requests){
   	$content = $requests->fist;
    $title = $requests->title;
   	News::insert($title,$content);
   	return redirect()->intended('new');
   }
}
