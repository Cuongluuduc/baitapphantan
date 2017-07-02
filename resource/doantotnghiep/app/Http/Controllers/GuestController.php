<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Guest;
use App\Tickit;
use App\Route_car;
use App\Router;
use App\Station;
use App\Pickup_point;
use App\Driver;
use App\DriverCar;
use App\CarRoute;
use App\Work;

class GuestController extends Controller
{
    public function getForm(){
        $guest = Guest::all();
        $roucar = Route_car::all();
        $tickit = Tickit::all();
        $rou = Router::all();
        $station = Station::all();
        $point = Pickup_point::all();
    	return view('guest.thongtinkhach',['guest'=>$guest,'tickit'=>$tickit,'roucar'=>$roucar, 'rou'=>$rou, 'station'=>$station,'point'=>$point]);
    }
    public function vote(Request $requests){
        $user_id = $requests->user_id;
        
        $tickit_id = $requests->chuyendi;
        $guest_id = Guest::finduser2($user_id,$tickit_id);
        $star1 = $requests->star;
        $star2 = $requests->star2;
        $lt_id = Tickit::timroucar($tickit_id);
        $carrou_id = Route_car::getcar_route_id($lt_id);
        $car_id = CarRoute::findcar_id($carrou_id);
        // $guest_id = Guest::findid($user_id);
        $soluot = Guest::timsoluot($guest_id);
        $driver_id = DriverCar::getdriver_id($car_id);
        $drivercar_id = Work::finddriver($guest_id,$tickit_id);
        $driver2_id = DriverCar::getdriver2($drivercar_id);
        // dump($soluot);
        // dump($guest_id);
        // dump(Guest::checkxacnhan($guest_id));
        // dump(Guest::checkvote($guest_id));
        // // dump($drivercar_id);
        if(Guest::checkxacnhan($guest_id)&&Guest::checkvote($guest_id)&&Work::checkdriverr($guest_id,$tickit_id)){
            $diem = Driver::chamdiem($driver_id,$soluot,$star1);
            $luot = Driver::soluot($driver_id,$soluot,$star1);
            Driver::updatevote($driver_id,$luot,$diem);
             $diem2 = Driver::chamdiem($driver2_id,$soluot,$star2);
             $luot2 = Driver::soluot($driver2_id,$soluot,$star2);
             Driver::updatevote($driver2_id,$luot2,$diem2);
            Guest::updatevote($guest_id);
            return redirect()->intended('guest')->with(['vote_message'=>'Cám ơn quý khách đã đánh giá!']);
        }else{
            return redirect()->intended('guest')->with(['kvote_message'=>'Quý khách đã vote, hoặc chưa không tham gia chuyến đi!']);
        }
    }
    public function doimatkhau(Request $requests){
       $userid = $requests->user_id;
       $level = $requests->level;
       $pold = $requests->pold;
       $mail = $requests->email;
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
          return redirect()->intended('guest')->with(['xacnhan_message'=>'Mật khẩu được thay đổi!']);
       }else{
        return redirect()->intended('guest')->with(['chuaxacnhan_message'=>'Phần mật khẩu xác nhận không trùng khớp!']);
       }
       }else{
        return redirect()->intended('guest')->with(['kxacnhan_message'=>'Mật khẩu không đúng!']);
       }
      
    }
}
