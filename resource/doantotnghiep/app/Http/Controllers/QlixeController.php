<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Car;
use App\Router;
use App\CarRoute;
use App\Station;
use App\CarStation;
class QlixeController extends Controller
{
    public function getFormxe(){
    	$status = 0;
    	$station = Station::all();
    	$rou = Router::all();
    	$car = Car::all();
    	$car1 = Car::where('status','=',$status)->where('type','=',1)->get();
        $car2 = Car::where('status','=',$status)->where('type','=',2)->get();
    	return view('admin.qlixe',['rou'=>$rou,'car1'=>$car1,'car2'=>$car2,'car'=>$car,'station'=>$station]);
    }
    public function postFormxe(Request $requests){
    	$namexe = $requests->textname;
    	$soghe = $requests->textsl;
    	$loaixe = $requests->type;
    	if ($soghe>3){
            Car::insertCar($namexe,$soghe,$loaixe);
           return redirect()->intended('qlixe')->with(['txe_message'=>'Thêm xe thành công!']);
    	}else{
    		return redirect()->intended('qlixe')->with(['ktxe_message'=>'Thêm xe không thành công!']);
    	}

    }
    public function postxetuyen(Request $requests){
    	$tuyen = $requests->tuyen;
    	$tuyenve = Router::swap($tuyen);
    	$car = $requests->car;
    	if($car!=""){
    		Car::editstatus($car);
    		$car_id = Car::findid($car);
    		CarRoute::insertCarRoute($tuyen,$car_id);
    		CarRoute::insertCarRoute($tuyenve,$car_id);
            return redirect()->intended('qlixe')->with(['txet_message'=>'Thêm xe vào tuyến thành công!']);
    	}
    	else{
    		return redirect()->intended('qlixe')->with(['ktxet_message'=>'Thêm xe vào tuyến không thành công!']);
    	}
    }
    public function postxetramdon(Request $requests){
      $ben = $requests->ben;
      $card = $requests->card;
      $car_id = Car::findid($card);
      if($card!=""){
            Car::editstatus($card);
            CarStation::insertCarStation($ben,$car_id);
            return redirect()->intended('qlixe')->with(['txed_message'=>'Thêm xe vào trạm thành công!']);
        }
        else{
            return redirect()->intended('qlixe')->with(['ktxed_message'=>'Thêm xe vào trạm không thành công!']);
        }
    }
    public function deletexe($id){
        if(Car::sawstatus($id)){
            Car::deleteCar($id);
            return redirect()->intended('qlixe')->with(['xoaxe_message'=>'Xóa xe thành công!']);
        }else{
           return redirect()->intended('qlixe')->with(['kxoaxe_message'=>'Xe đang được phân công không được xóa!']); 
        }
    }
}
