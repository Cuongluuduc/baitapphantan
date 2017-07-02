<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Station;
use App\AdminStation;
use App\Router;
use App\Route_car;
use App\Tickit;
use App\DriverCar;
use App\Driver;
use App\User;
use App\CarRoute;
use App\Car;
use App\CarStation;
use App\Work;
use App\Guest;


class AdminStationController extends Controller
{
    public function getForm(){
        $driver = Driver::all();
        $user = User::all();
        $ad = AdminStation::all();
        $rou = Router::all();
        $car = Car::all();
        $carstation = CarStation::all();
        $rou_car = Route_car::all();
        $drcar = DriverCar::all();
    	return view('admin_station.tonghop',['ad'=>$ad,'rou_car'=>$rou_car, 'user'=>$user, 'driver'=>$driver, 'car'=>$car, 'rou'=>$rou, 'carstation'=>$carstation,'drcar'=>$drcar]);
    }
    public function getttcanhan(){
    	$ad = AdminStation::all();
    	$station = Station::all();
    	return view('admin_station.canhan',['ad'=>$ad,'station'=>$station]);
    }
    public function postttcanhan(Request $requests){
    	$phone = $requests->textPhone;
       $trd = $requests->textgraduation;
       $userid = $requests->userid;
       $iddriver = AdminStation::findiddriver($userid);
       AdminStation::edittt($iddriver,$phone,$trd);
       return redirect()->intended('adminsts_tt');
    }
    public function getdsve(){
    	$ad = AdminStation::all();
    	$rou = Router::all();
    	$rou_car = Route_car::all();
    	$tickit = Tickit::all();
    	$user = User::all();
    	$dcar = DriverCar::all();
    	$driver = Driver::all();
    	$car_rou = CarRoute::all();
    	return view('admin_station.dsve',['ad'=>$ad, 'rou'=>$rou, 'rou_car'=>$rou_car, 'tickit'=>$tickit, 'user'=>$user, 'dcar'=>$dcar, 'car_rou'=>$car_rou, 'driver'=>$driver]);
    }
    public function getdsvengaymai(){
      $ad = AdminStation::all();
      $rou = Router::all();
      $rou_car = Route_car::all();
      $tickit = Tickit::all();
      $user = User::all();
      $dcar = DriverCar::all();
      $driver = Driver::all();
      $car_rou = CarRoute::all();
      return view('admin_station.ngaymai',['ad'=>$ad, 'rou'=>$rou, 'rou_car'=>$rou_car, 'tickit'=>$tickit, 'user'=>$user, 'dcar'=>$dcar, 'car_rou'=>$car_rou, 'driver'=>$driver]);
    }
    public function getlsu(){
    	$ad = AdminStation::all();
    	$rou = Router::all();
    	$rou_car = Route_car::all();
    	$tickit = Tickit::all();
    	return view('admin_station.lsu',['ad'=>$ad, 'rou'=>$rou, 'rou_car'=>$rou_car, 'tickit'=>$tickit]);
    }
    public function editmk(Request $requests){
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
          return redirect()->intended('adminsts_tt')->with(['xacnhan_message'=>'Mật khẩu được thay đổi!']);
       }else{
        return redirect()->intended('adminsts_tt')->with(['chuaxacnhan_message'=>'Phần mật khẩu xác nhận không trùng khớp!']);
       }
       }else{
        return redirect()->intended('adminsts_tt')->with(['kxacnhan_message'=>'Mật khẩu không đúng!']);
       }
      
       
    }
    public function xacnhan(Request $requests){
        $check = $requests->check;
        $tickitt_id = $requests->ve;
        $guest = Guest::all();
        $khach = array();
        $tickit_id = "";
        if(count($check)>0){
        foreach ($guest as $key => $value) {
            for ($i=0; $i < count($check); $i++) { 
                if($value->id==$check[$i]){
                    $khach[] =$value;
                }
            }
        }
        
       foreach ($khach as $key => $value) {
        if(Tickit::checkxacnhan($value->tickit_id)){
           Guest::xacnhan($value->id);
          
           $soluong = $value->number;
           $tickit_id = $value->tickit_id;
           $guest_id = $value->id;
           Work::insertkhach($tickit_id,$guest_id);
       }
       }
        Tickit::xacnhan($tickit_id);
      return redirect()->intended('adminsts_dsve')->with(['xacnhan_message'=>'Đã xác nhận!']);
    }else{
        Tickit::xacnhan($tickitt_id);

      return redirect()->intended('adminsts_dsve')->with(['xacnhan_message'=>'Đã xác nhận!']);

    }
    }
    public function xacnhanngaymai(Request $requests){
        $check = $requests->check;
        $tickitt_id = $requests->ve;
        $guest = Guest::all();
        $khach = array();
        $tickit_id = "";
        if(count($check)>0){
        foreach ($guest as $key => $value) {
            for ($i=0; $i < count($check); $i++) { 
                if($value->id==$check[$i]){
                    $khach[] =$value;
                }
            }
        }
        
       foreach ($khach as $key => $value) {
        if(Tickit::checkxacnhan($value->tickit_id)){
           Guest::xacnhan($value->id);
          
           $soluong = $value->number;
           $tickit_id = $value->tickit_id;
           $guest_id = $value->id;
           Work::insertkhach($tickit_id,$guest_id);
       }
       }
        Tickit::xacnhan($tickit_id);
      return redirect()->intended('adminsts_ngaymai')->with(['xacnhanmai_message'=>'Đã xác nhận!']);
    }else{
        Tickit::xacnhan($tickitt_id);

      return redirect()->intended('adminsts_ngaymai')->with(['xacnhanmai_message'=>'Đã xác nhận!']);

    }
    }
    public function doilaixe(Request $requests){
        $userid = $requests->category;
        $driver_id_moi = Driver::findiddriver($userid);
        $drivercar_idmoi = DriverCar::getid($driver_id_moi);
        $lotrinh_id = $requests->lotrinh_id;
        $lotrinh = Route_car::where('id','=',$lotrinh_id)->get();
        $rou_car = array();
        foreach ($lotrinh as $key => $value) {
            if($value->id==$lotrinh_id){
                $rou_car[] = $value;
            }
        }
        $xelt = CarRoute::all();
        $xeltct = array();
         $try ="";
        foreach ($xelt as $key => $value) {
            foreach ($rou_car as $key => $val) {
                if($val->car_route_id==$value->id){
                    // $xeltct[]=$value;
                    $try = $value->car_id;
                }
            }
        }
        $ngxe = DriverCar::all();
        $ngxect = array();
        // foreach ($ngxe as $key => $value) {
        //     foreach ($xeltct as $key => $val) {
        //         if($val->car_id==$ngxe->car_id){
        //             $ngxect[] = $value; 
        //         }
        //     }
        // }
        foreach ($ngxe as $key => $value) {
            if($value->car_id==$try){
               $ngxect[] = $value;
            }
        }
        $id_cu = "";
        $driver_cu = "";
        foreach ($ngxect as $key => $value) {
            $id_cu = $value->id;
            $driver_cu = $value->driver_id;
        }
        
        DriverCar::change($id_cu,$driver_id_moi);
        DriverCar::change($drivercar_idmoi,$driver_cu);
         return redirect()->intended('adminsts_dsve')->with(['doi_message'=>'Đổi lái xe thành công!']);
    }
     public function doilaixengaymai(Request $requests){
        $userid = $requests->category;
        $driver_id_moi = Driver::findiddriver($userid);
        $drivercar_idmoi = DriverCar::getid($driver_id_moi);
        $lotrinh_id = $requests->lotrinh_id;
        $lotrinh = Route_car::where('id','=',$lotrinh_id)->get();
        $rou_car = array();
        foreach ($lotrinh as $key => $value) {
            if($value->id==$lotrinh_id){
                $rou_car[] = $value;
            }
        }
        $xelt = CarRoute::all();
        $xeltct = array();
         $try ="";
        foreach ($xelt as $key => $value) {
            foreach ($rou_car as $key => $val) {
                if($val->car_route_id==$value->id){
                    // $xeltct[]=$value;
                    $try = $value->car_id;
                }
            }
        }
        $ngxe = DriverCar::all();
        $ngxect = array();
        // foreach ($ngxe as $key => $value) {
        //     foreach ($xeltct as $key => $val) {
        //         if($val->car_id==$ngxe->car_id){
        //             $ngxect[] = $value; 
        //         }
        //     }
        // }
        foreach ($ngxe as $key => $value) {
            if($value->car_id==$try){
               $ngxect[] = $value;
            }
        }
        $id_cu = "";
        $driver_cu = "";
        foreach ($ngxect as $key => $value) {
            $id_cu = $value->id;
            $driver_cu = $value->driver_id;
        }
        
        DriverCar::change($id_cu,$driver_id_moi);
        DriverCar::change($drivercar_idmoi,$driver_cu);
         return redirect()->intended('adminsts_ngaymai')->with(['doimai_message'=>'Đổi lái xe thành công!']);
    }
    public function phancong($id){
           $data = Work::where('tickit_id','=',$id)->get(); 
           $user = Auth::user()->id;
           $admin = AdminStation::where('user_id','=',$user)->get();
           $station = Station::all();
           $stact = array();
           $car = CarStation::all();
           $carct = array();
           foreach ($station as $key => $value) {
               foreach ($admin as $key => $val) {
                   if($value->id==$val->station_id){
                    $stact[] = $val;
                   }
               }
           }
           foreach ($stact as $key => $value) {
               foreach ($car as $key => $val) {
                   if($value->station_id==$val->station_id){
                    $carct[] = $val; 
                   }
               }
           }
           $drivercar = DriverCar::all();
           $drivercarct = array();
           foreach ($carct as $key => $value) {
               foreach ($drivercar as $key => $val) {
                   if($val->car_id==$value->car_id){
                    $drivercarct[] = $val;
                   }
               }
           }
           if(count($drivercarct)>0){
           foreach ($data as $key => $value) {
            for ($i=0; $i <count($drivercarct) ; $i++) { 
                if(Work::checkdriver($value->id)){
                    if($value->id%count($drivercarct)==$i){
                       Work::insertpc($value->id,$drivercarct[$i]->id); 
                    }
                }
            }
               
           }
          return redirect()->intended('adminsts_dsve')->with(['pc_message'=>'Đã phân lái xe đón!']); 
       } else{
          return redirect()->intended('adminsts_dsve')->with(['kpc_message'=>'không có xe đón!']); 
       }
    }
    public function phancongngaymai($id){
           $data = Work::where('tickit_id','=',$id)->get(); 
           $user = Auth::user()->id;
           $admin = AdminStation::where('user_id','=',$user)->get();
           $station = Station::all();
           $stact = array();
           $car = CarStation::all();
           $carct = array();
           foreach ($station as $key => $value) {
               foreach ($admin as $key => $val) {
                   if($value->id==$val->station_id){
                    $stact[] = $val;
                   }
               }
           }
           foreach ($stact as $key => $value) {
               foreach ($car as $key => $val) {
                   if($value->station_id==$val->station_id){
                    $carct[] = $val; 
                   }
               }
           }
           $drivercar = DriverCar::all();
           $drivercarct = array();
           foreach ($carct as $key => $value) {
               foreach ($drivercar as $key => $val) {
                   if($val->car_id==$value->car_id){
                    $drivercarct[] = $val;
                   }
               }
           }
           if(count($drivercarct)>0){
           foreach ($data as $key => $value) {
            for ($i=0; $i <count($drivercarct) ; $i++) { 
                if(Work::checkdriver($value->id)){
                    if($value->id%count($drivercarct)==$i){
                       Work::insertpc($value->id,$drivercarct[$i]->id); 
                    }
                }
            }
               
           }
          return redirect()->intended('adminsts_ngaymai')->with(['pcmai_message'=>'Đã phân lái xe đón!']); 
       } else{
          return redirect()->intended('adminsts_ngaymai')->with(['kpcmai_message'=>'không có xe đón!']); 
       }
    }
}
