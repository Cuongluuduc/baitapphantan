<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Driver;
use App\DriverCar;
use App\Car;
use App\Tickit;
use App\Route_car;
use App\Router;
use App\CarRoute;
use App\Station;
use App\User;
class DriverController extends Controller
{
    public function getForm(){
    	$driver = Driver::all();
    	return view('driver.canhan',['driver'=>$driver]);
    }
    public function postForm(Request $requests){
       $phone = $requests->textPhone;
       $trd = $requests->textgraduation;
       $kn = $requests->textkinhnghiem;
       $userid = $requests->userid;
       $iddriver = Driver::findiddriver($userid);
       Driver::edittt($iddriver,$phone,$kn,$trd);
       return redirect()->intended('driver');
    }
    public function suamk(Request $requests){
       $userid = $requests->user_id;
       $level = $requests->level;
       $pold = $requests->pold;
       $mail = $requests->mail;
       $pnew1 = $requests->pnew1;
       $pnew2 = $requests->pnew2;
       $mk = $requests->mkcu;
       $login = array(
           'email'     => $mail,
           'password' => $pold,
           'level'    => $level
        );
       
       if(Auth::attempt($login)){
         if($pnew1==$pnew2){
          User::changePass($userid,$pnew2);
          return redirect()->intended('driver')->with(['xacnhan_message'=>'Mật khẩu được thay đổi!']);
       }else{
        return redirect()->intended('driver')->with(['chuaxacnhan_message'=>'Phần mật khẩu xác nhận không trùng khớp!']);
       }
       }else{
        return redirect()->intended('driver')->with(['kxacnhan_message'=>'Mật khẩu không đúng!']);
       }
      
    }
    public function xemlich(){
         $rou = Router::all();
         $user = Driver::all();
         $drivercar = DriverCar::all();
         $car = Car::all();
         $roucar = Route_car::all();
         $carrou = CarRoute::all();
         $tickit = Tickit::all();
         $station = Station::all();
         $userid = Auth::user()->id;
         $driver_id = Driver::findiddriver($userid);
         $type = Driver::timtype($driver_id);
         if($type==1){
      return view('driver.lich',['car'=>$car,'roucar'=>$roucar,'tickit'=>$tickit, 'drivercar'=>$drivercar, 'carrou'=>$carrou,'user'=>$user,'rou'=>$rou,'station'=>$station]);
    }else{
       return view('driver.lichlaixedon',['car'=>$car,'roucar'=>$roucar,'tickit'=>$tickit, 'drivercar'=>$drivercar, 'carrou'=>$carrou,'user'=>$user,'rou'=>$rou,'station'=>$station]);
    }
    }
}
