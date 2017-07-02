<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tickit;
use App\Router;
use App\User;
use App\Guest;
use App\Route_car;
use App\Station;
use App\Pickup_point;
use App\CarRoute;
use App\Car;
use App\CarStation;
use App\AdminStation;
use App\News;
use App\DriverCar;
use App\Driver;
use Illuminate\Support\Facades\Input;
use  Maatwebsite\Excel\Facades\Excel;

class TickitController extends Controller
{
    public function getImportTickit(){
    	return view('admin.themve');
    }
    public function postImportTickit(){
    	$date=date('Y-m-d');
    	Tickit::checkdate($date);
    	Excel::load(Input::file('file'),function($reader){
    		$reader->each(function($sheet){
    			foreach ($sheet as $row) {
                    $tuyen =$row->tuyen;
                    $idtuyen = Router::findidname($tuyen);
                    $idlt = Route_car::findidltexcel($idtuyen,$row->thoigian);
                    $car_route_id = Route_car::getcar_route_id($idlt);
                    $car_id = CarRoute::findcar_id($car_route_id);
                    $ghe = Car::getsoghe($car_id);
    				if(Tickit::checkRoute($idlt)&&Tickit::checkdate($row->ngay)&&Tickit::checkRoute_Date($idlt, $row->ngay)){
    					Tickit::insertVe($idlt,$row->ngay,$row->gia,$ghe,$ghe);
    				}
    			}
    			
    		});
    	});
    	return redirect()->intended('dsve');
    }
    public function getbookTickit(){
        $categories= Station::all();
        $new = News::where('id','=',2)->get();
        return view('formdk',['new'=>$new,'categories'=>$categories]);
    }
    public function postbookTickit(Request $requests){
        $station_id = $requests->category;
        $data = $requests->txtsoluong;
        $rou = $requests->time;
        $name = $requests->txtname;
        $phone = $requests->txtphone;
        $email = $requests->txtemail;
        $date = $requests->txtdate;
        $pickupcar_id = $requests->pick_up;
        $date=date('Y-m-d',strtotime($date));
        $status = 0;
        $tickit_id = Tickit::tickit_id($rou,$date);
        if($data>0&&$data<10){
        if(Tickit::checkDated($date,$rou)){
            if(Tickit::check_empty_tickit($rou,$data,$date)){
            if(User::checkEmail($email)){
              User::insertguest($name,$email);  
            }
            $user_id = User::user_id($email);
            Station::editslgve($station_id,$data);
            Tickit::insert_empty_tickit($rou,$data,$date);
            Guest::insertGuest($data,$phone,$status,$user_id,$tickit_id,$pickupcar_id);
             return redirect()->intended('home')->with(['flash_message'=>'Đặt vé thành công!']);
        } else{
            if(User::checkEmail($email)){
              User::insertguest($name,$email);  
            }
            $status = -1;
            $user_id = User::user_id($email);
            Guest::insertGuest($data,$phone,$status,$user_id,$tickit_id,$pickupcar_id);
             return redirect()->intended('home')->with(['flas_message'=>'Xe hết vé!']);
        }
    }
    }else{
            return redirect()->intended('home')->with(['fla_message'=>'Quý khách vui lòng xem lại thông tin đặt vé']);
    }
        
    }
    public function getTickit(){
        $router_car = Route_car::all();
        $route = Router::all();
       // $station = Station();
        $date = date('Y-m-d');
        $data = Tickit::where('date','=',$date)->get();
        
        return view('admin.dsve',['data'=>$data,'route'=>$route, 'router_car'=>$router_car]);
    }
    public function LSTickit(){
        $router_car = Route_car::all();
        $route = Router::all();
       // $station = Station();
        $date = date('Y-m-d');
        $data = Tickit::where('date','=',$date);
        $data2 = Tickit::all();
        return view('admin.lsve',['data'=>$data,'route'=>$route, 'router_car'=>$router_car, 'data2'=>$data2]); 
    }
    public function XemTickit(){
        $router_car = Route_car::all();
        $route = Router::all();
        $date = date('Y-m-d');
        $data = Tickit::where('date','>=',$date)->get();
        
        return view('xemve',['data'=>$data,'route'=>$route, 'router_car'=>$router_car]);  
    }
    public function getRoute(){
        $categories = Station::all();
        $pick = Pickup_point::all();
        $tuyen = Router::all();
         return view('admin.themtuyenlt',['categories'=>$categories,'pick'=>$pick,'tuyen'=>$tuyen]);
    }
    public function postStation(Request $requests){
        $name = $requests->textname;
        if(Station::checkname($name)){
            Station::insertStation($name);
        return redirect()->intended('themtuyenlt')->with(['f_message'=>'Thêm bến thành công!']);
    } else{
            return redirect()->intended('themtuyenlt')->with(['fl_message'=>'Bến đã tồn tại!']);
    }
    }
    public function editStation(Request $requests){
        $name = $requests->textben;
        $idben = $requests->ben;
        Station::editStation($idben,$name);
        return redirect()->intended('themtuyenlt')->with(['dsb_message'=>'Bến đã được sửa tên!']);

    }
    public function deleteStation(Request $requests){
        $idben = $requests->cate1;
        $id_carstation = CarStation::findCarStation($idben);
        foreach ($id_carstation as $key => $value) {
            $car_id = $value->car_id;
            CarStation::deleteCarStation($value->id);
            Car::updatest($car_id);
            Car::upDateStatus2($car_id);
            $drivercar_id = DriverCar::getphancong($car_id);
            $laixe_id = DriverCar::laylaixe_id($drivercar_id);
            DriverCar::deleteDriverCar($drivercar_id);
            Driver::upDateStatuslai($laixe_id);
        }
        $adminstation = AdminStation::findadmin($idben);
        foreach ($adminstation as $key => $value) {
            $user_id = $value->user_id;
            AdminStation::deleteAd($value->id);
            User::deleteuser($user_id);
        }
        $pick = Pickup_point::findstation($idben);
        foreach ($pick as $key => $value) {
            Pickup_point::deletePoint($value->id);
        }
        $idtuyen = Router::findid($idben);
        // for ($i=0; $i <count($idtuyen) ; $i++) { 
        //     $id = $idtuyen[$i];
        //     $idtuyen2 = Router::swap($id);
        //     Router::deleteRouter($idtuyen2);
        //     Router::deleteRouter($id);
        // }
        foreach ($idtuyen as $key => $value) {
            $id = $value->id;
            $idtuyen2 = Router::swap($id);
            $idroucar = Route_car::findid($id);
            foreach ($idroucar as $key => $value) {
                Route_car::deleteRoutercar($value->id);
            }
            $idroucar2 = Route_car::findid($idtuyen2);
            foreach ($idroucar2 as $key => $value) {
                Route_car::deleteRoutercar($value->id);
            }
            $carrou1 = CarRoute::getCarRoute($id);
            $carrou2 = CarRoute::getCarRoute($idtuyen2);
            foreach ($carrou1 as $key => $value) {
                $idcar1 = $value->car_id;
                CarRoute::deleteCarRoute($value->id);
                Car::updatest($idcar1);
                Car::upDateStatus2($idcar1);
                $drivercar_id = DriverCar::getphancong($idcar1);
                $laixe_id = DriverCar::laylaixe_id($drivercar_id);
                DriverCar::deleteDriverCar($drivercar_id);
                Driver::upDateStatuslai($laixe_id);
             } 
            foreach ($carrou2 as $key => $value) {
                $idcar2 = $value->car_id;
                CarRoute::deleteCarRoute($value->id);
                Car::updatest($idcar2);
                Car::upDateStatus2($idcar2);
                $drivercar_id = DriverCar::getphancong($idcar2);
                $laixe_id = DriverCar::laylaixe_id($drivercar_id);
                DriverCar::deleteDriverCar($drivercar_id);
                Driver::upDateStatuslai($laixe_id);
             } 
            Router::deleteRouter($idtuyen2);
            Router::deleteRouter($id);
        }
        Station::deleteStation($idben);
        return redirect()->intended('themtuyenlt')->with(['xoaben_message'=>'Bến đã xóa!']);
    }
    public function postPickup(Request $requests){
        $name = $requests->textkv;
        $id = $requests->category;
        if(Pickup_point::checkname($name)){
            Pickup_point::insertPickup($id,$name);
            return redirect()->intended('themtuyenlt')->with(['dd_message'=>'Điểm đón được tạo!']);
        }else{
                 return redirect()->intended('themtuyenlt')->with(['dtr_message'=>'Điểm đón đã có sẵn!']);
        }

    }
    public function deletePickup(Request $requests){
        $id = $requests->pick;
        Pickup_point::deletePoint($id);
        return redirect()->intended('themtuyenlt')->with(['dx_message'=>'Điểm đón được xóa!']);
    }
    public function fixPickup(Request $requests){
        $name = $requests->textsuaddon;
        $id = $requests->pickk;
        Pickup_point::fixPickupp($id,$name);
        return redirect()->intended('themtuyenlt')->with(['ds_message'=>'Điểm đón được sửa!']);
    }
    public function postRoute(Request $requests){
        $xp = $requests->category;
        $dich = $requests->cate;
        $time = $requests->timeStart;
        // $total_time = date('H-i',strtotime($time));
        $sm = Station::getSationid($xp);
        $sh = Station::getSationid($dich);
        $name = $sm."<=>".$sh;
        $namep = $sh."<=>".$sm;
        if($xp!=$dich){
            if(Router::check($name,$name)){
                // $sm = Station::getSationid($xp);
                // $sh = Station::getSationid($dich);
                Router::insertRoute($name,$xp,$dich,$time);
                Router::insertRoute($namep,$dich,$xp,$time);
                return redirect()->intended('themtuyenlt')->with(['t_message'=>'tuyến xe được tạo!']);
            }else{
               return redirect()->intended('themtuyenlt')->with(['th_message'=>'tuyến xe đã tồn tại!']); 
            }
        } else{
                 return redirect()->intended('themtuyenlt')->with(['tr_message'=>'Hai bến phải khác nhau!']);
        }
    }
    public function deleteRoute(Request $requests){
      $tuyen = $requests->tuyen;
      $tuyen2 = Router::swap($tuyen);
            $idroucar = Route_car::findid($tuyen);
            foreach ($idroucar as $key => $value) {
                Route_car::deleteRoutercar($value->id);
            }
            $idroucar2 = Route_car::findid($tuyen2);
            foreach ($idroucar2 as $key => $value) {
                Route_car::deleteRoutercar($value->id);
            }
            $carrou1 = CarRoute::getCarRoute($tuyen);
            $carrou2 = CarRoute::getCarRoute($tuyen2);
            foreach ($carrou1 as $key => $value) {
                $idcar1 = $value->car_id;
                CarRoute::deleteCarRoute($value->id);
                Car::updatest($idcar1);
                Car::upDateStatus2($idcar1);
                $drivercar_id = DriverCar::getphancong($idcar1);
                $laixe_id = DriverCar::laylaixe_id($drivercar_id);
                DriverCar::deleteDriverCar($drivercar_id);
                Driver::upDateStatuslai($laixe_id);
             } 
            foreach ($carrou2 as $key => $value) {
                $idcar2 = $value->car_id;
                CarRoute::deleteCarRoute($value->id);
                Car::updatest($idcar2);
                Car::upDateStatus2($idcar2);
                $drivercar_id = DriverCar::getphancong($idcar2);
                $laixe_id = DriverCar::laylaixe_id($drivercar_id);
                DriverCar::deleteDriverCar($drivercar_id);
                Driver::upDateStatuslai($laixe_id);
             } 
            Router::deleteRouter($tuyen2);
            Router::deleteRouter($tuyen);
            return redirect()->intended('themtuyenlt')->with(['xoatuyen_message'=>'Xoa tuyen thành công!']);
    }
    public function editRoute(Request $requests){
        $tuyen = $requests->tuyen;
        $time = $requests->timeStart;
        $tuyenve = Router::swap($tuyen);
        Router::editRoute($tuyen,$time);
        Router::editRoute($tuyenve,$time);
        return redirect()->intended('themtuyenlt')->with(['suatuyen_message'=>'Thời gian tuyến đã được sửa!']);
    }
    public function getLoTrinh(){
        $categories= Station::all();
        $lt = Route_car::all();
        $carrou = CarRoute::all();
        $car = Car::all();
        $rou = Router::all();
        return view('admin.taolt',['categories'=>$categories,'lt'=>$lt,'rou'=>$rou,'carrou'=>$carrou,'car'=>$car]);
    }
    public function postLoTrinh(Request $requests){
       $router_id = $requests->tuyen;
       $idxe = $requests->xe;
       $router_idp = Router::swap($router_id);
       $idxe1 = CarRoute::findid($router_id,$idxe);
       $idxe2 = CarRoute::findid($router_idp,$idxe);
       $total_time = Router::findtotaltime($router_id);
       $total_timeh = date('H',strtotime($total_time));
       $total_timep = date('i',strtotime($total_time));
       $t = $total_timeh + $total_timep;
       $time = $requests->timeStart;
       $timep = date('i',strtotime($time));
       $timeh = date('H',strtotime($time));
       $timedata = $timeh." giờ ".$timep." phút";
       if($total_timeh<3||$t==3){
        $t1 = Router::addh($total_time,$time);
        $t1h = date('H',strtotime($t1));
        $t1p = date('i',strtotime($t1));
        $t1data = $t1h." giờ ".$t1p." phút";
        $t2 = Router::addh($t1,$total_time);
        $t2h = date('H',strtotime($t2));
        $t2p = date('i',strtotime($t2));
        $t2data = $t2h." giờ ".$t2p." phút";
        $t3 = Router::addh($t2,$total_time);
        $t3h = date('H',strtotime($t3));
        $t3p = date('i',strtotime($t3));
        $t3data = $t3h." giờ ".$t3p." phút";
        Route_car::checktimee($router_idp,$t1);
        if(Route_car::checktimee($router_id,$time)&&Route_car::checktimee($router_idp,$t1)&&Route_car::checktimee($router_id,$t2)&&Route_car::checktimee($router_idp,$t3)){
             Route_car::insertRouCar($router_id,$timedata,$time,$idxe1);
             Route_car::insertRouCar($router_idp,$t1data,$t1,$idxe2);
             Route_car::insertRouCar($router_id,$t2data,$t2,$idxe1);
             Route_car::insertRouCar($router_idp,$t3data,$t3,$idxe2);
             CarRoute::statusid($idxe1,1);
             CarRoute::statusid($idxe2,1);
             return redirect()->intended('taolt')->with(['tlt_message'=>'Lộ trình được tạo!']);
        }else{
           return redirect()->intended('taolt')->with(['ktlt_message'=>'Lộ trình đã tồn tại hoặc không hợp lí!']); 
        }
       }elseif ($total_timeh<6&&$total_timeh>3) {
        $t1 = Router::addh($total_time,$time);
        $t1h = date('H',strtotime($t1));
        $t1p = date('i',strtotime($t1));
        $t1data = $t1h." giờ ".$t1p." phút";
        if(Route_car::checktimee($router_id,$time)&&Route_car::checktimee($router_idp,$t1)){
             Route_car::insertRouCar($router_id,$timedata,$time,$idxe1);
             Route_car::insertRouCar($router_idp,$t1data,$t1,$idxe2);
             CarRoute::statusid($idxe1,1);
             CarRoute::statusid($idxe2,1);
             return redirect()->intended('taolt')->with(['tlt_message'=>'Lộ trình được tạo!']);
        }else{
           return redirect()->intended('taolt')->with(['ktlt_message'=>'Lộ trình đã tồn tại hoặc không hợp lí!']); 
        }
       }else{
        if(Route_car::checktimee($router_id,$time)&&Route_car::checktimee($router_idp,$time)){
            Route_car::insertRouCar($router_id,$timedata,$time,$idxe1);
            Route_car::insertRouCar($router_idp,$timedata,$time,$idxe1);
            return redirect()->intended('taolt')->with(['tlt_message'=>'Lộ trình được tạo!']);
        }else{
           return redirect()->intended('taolt')->with(['ktlt_message'=>'Lộ trình đã tồn tại hoặc không hợp lí!']); 
        }
       }
       
    }
   public function deleteLoTrinh($id){
       $data = Route_car::find($id);
       $data->delete($id);
       return redirect()->intended('taolt')->with(['xlt_message'=>'Lộ trình đã được xóa!']);
   }
   // public function geteditLoTrinh($id){
   //     $data = Route_car::find($id);
   //      return
   // }
   public function posteditLoTrinh(Request $requests){
    $loTringID=$requests->input('id');
    $time = $requests->timeStart;
    $timep = date('i',strtotime($time));
    $timedata = date('H',strtotime($time));
    $timedata = $timedata." giờ ".$timep." phút";
    $findLT =Route_car::find($loTringID);
    $findLT->time = $timedata;
    $findLT->save();
    return redirect()->intended('taolt')->with(['slt_message'=>'Lộ trình đã được sửa!']);
   }
   public function thongke(){
    return view('admin.thongke');
   }
}
