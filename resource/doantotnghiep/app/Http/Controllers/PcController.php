<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Driver;
use App\DriverCar;
use App\CarRoute;
use App\Car;
use App\Station;
use App\Router;
use App\Route_car;
use App\Tickit;
use  Maatwebsite\Excel\Facades\Excel;
class PcController extends Controller
{
    public function postpcxelt(){
    	$driverTypeOne=Driver::getDriverOne();
    	$carRoute=Car::getCarOne();
        if(count($driverTypeOne)==0&&count($carRoute)!=0){
        return redirect()->intended('admin')->with(['a_message'=>'Cần tuyển thêm lái xe!']);
        }elseif (count($driverTypeOne)!=0&&count($carRoute)==0) {
        return redirect()->intended('admin')->with(['b_message'=>'Cần tuyển thêm  xe!']);    
        }elseif (count($driverTypeOne)==0&&count($carRoute)==0) {
         return redirect()->intended('admin')->with(['c_message'=>'Thêm lái xe, xe để phân công!']);   
        }else{
    	if(count($driverTypeOne)>count($carRoute)){
    		for($i=0;$i<count($carRoute);$i++){
    			DriverCar::assign($driverTypeOne[$i]->id,$carRoute[$i]->id);
    			Driver::updateStatus($driverTypeOne[$i]->id);
                Car::updateStatus($carRoute[$i]->id);
    		}
    	}else{
    		for($i=0;$i<count($driverTypeOne);$i++){
    			DriverCar::assign($driverTypeOne[$i]->id,$carRoute[$i]->id);
    			Driver::updateStatus($driverTypeOne[$i]->id);
                Car::updateStatus($carRoute[$i]->id);
    		}
    	}
    return redirect()->intended('admin')->with(['d_message'=>'Phân công thành công, xem kết quả bên cạnh!']);
    }
    }
    public function postpcxetr(){
        $driverTypeTwo=Driver::getDriverTwo();
        $carRoute=Car::getCarTwo();
        if(count($driverTypeTwo)==0&&count($carRoute)!=0){
        return redirect()->intended('admin')->with(['a_message'=>'Cần tuyển thêm lái xe!']);
        }elseif (count($driverTypeTwo)!=0&&count($carRoute)==0) {
        return redirect()->intended('admin')->with(['b_message'=>'Cần tuyển thêm  xe!']);    
        }elseif (count($driverTypeTwo)==0&&count($carRoute)==0) {
         return redirect()->intended('admin')->with(['c_message'=>'Thêm lái xe, xe để phân công!']);   
        }else{
        if(count($driverTypeTwo)>count($carRoute)){
            for($i=0;$i<count($carRoute);$i++){
                DriverCar::assign($driverTypeTwo[$i]->id,$carRoute[$i]->id);
                Driver::updateStatus($driverTypeTwo[$i]->id);
                Car::updateStatus($carRoute[$i]->id);
            }
        }else{
            for($i=0;$i<count($driverTypeTwo);$i++){
                DriverCar::assign($driverTypeTwo[$i]->id,$carRoute[$i]->id);
                Driver::updateStatus($driverTypeTwo[$i]->id);
                Car::updateStatus($carRoute[$i]->id);
            }
        }
         return redirect()->intended('admin')->with(['d_message'=>'Phân công thành công, xem kết quả bên cạnh!']);
    }
    }
    public function baocao(){
        $station = Station::all();
        return view('admin.baocao',['station'=>$station]);
    }
    public function laydulieu(Request $requests){
        if($requests->ajax()){
            $err = "Dữ liệu không có";
            $output = "";
            $databen = $requests->ben;
            $datathang = $requests->thoigian;
            $rou = Router::where('station_id','=', $databen)->get();
            if(count($rou)>0){  
                $i = 0;
                
            foreach ($rou as $key => $value) {
                 $s = 0;
                 $t = 0;
                 $k = 0;
                 $i++;
                $lt = Route_car::where('router_id','=',$value->id)->get(); 
                foreach ($lt as $key => $val) {
                    $s+= Tickit::tinhsove($val->id,$datathang);
                    $t+= Tickit::tinhdoanhthu($val->id,$datathang);
                    $k+= Tickit::tinhsochuyen($val->id,$datathang);
                }
               
              $output.=
            '<tr>'.
            '<td>'.$i.'</td>'.
            '<td>'.$value->name.'</td>'.
            '<td>'.$s.'</td>'.
            '<td>'.$k.'</td>'.
            '<td>'.$t.'</td>'.
            '</tr>';  
            }
            return Response($output);
        }else{
           return Response($err); 
        }
        }

    }
    public function laydulieuhai(Request $requests){
        if($requests->ajax()){
            $err = "Dữ liệu không có";
            $output = "";
            $databen = $requests->ben;
            $datathang = $requests->thoigian;
            $rou = Router::where('station_id','=', $databen)->get();
            $ben = Station::where('id','=',$databen)->get();
            if(count($rou)>0){ 
                $i = 0;
            foreach ($ben as $key => $v) {
                 $i++;
                 $tongve = 0;
                 $doanhthu = 0;
                 $sochuyen = 0;
            foreach ($rou as $key => $value) {
                 $s = 0;
                 $t = 0;
                 $k = 0;
                $lt = Route_car::where('router_id','=',$value->id)->get(); 
                foreach ($lt as $key => $val) {
                    $s+= Tickit::tinhsove($val->id,$datathang);
                    $t+= Tickit::tinhdoanhthu($val->id,$datathang);
                    $k+= Tickit::tinhsochuyen($val->id,$datathang);
                }
                $tongve+=$s;
                $doanhthu+=$t;
                $sochuyen+=$k;
               }
              $output.=
            '<tr>'.
            '<td>'.$i.'</td>'.
            '<td>'.$v->name.'</td>'.
            '<td>'.$tongve.'</td>'.
            '<td>'.$sochuyen.'</td>'.
            '<td>'.$doanhthu.'</td>'.
            '</tr>';  
            
        }
            return Response($output);
        }else{
           return Response($err); 
        }
        }
    }
    public function laydulieuba(Request $requests){
        if($requests->ajax()){
            $nglai = array();
            $err = "Dữ liệu không có";
            $output = "";
            $databen = $requests->ben;
            $datathang = $requests->thoigian;
            $rou = Router::where('station_id','=',$databen)->get();
            $ben = Station::where('id','=',$databen)->get();
            $carstation = App\CarStation::where('station_id','=',$databen)->get();
            $drivercar = DriverCar::all();
            foreach ($drivercar as $key => $value) {
                foreach ($carstation as $key => $val) {
                    if($value->car_id==$val->car_id){
                        $nglai[] = $value;
                    }
                }
            }
            $driver = Driver::all();
            $lx = array();
            foreach ($driver as $key => $value) {
                foreach ($nglai as $key => $val) {
                    if($value->id==$val->driver_id){
                        $lx[] = $value;
                    }
                }
            }
            $user = App\User::all();
            $ten = array();
            foreach ($user as $key => $value) {
                foreach ($lx as $key => $val) {
                    if($value->id==$val->user_id){
                        $ten[] = $value;
                    }
                }
            }
            $i = 0;
            foreach ($ten as $key => $value) {
                $i++;
            
              $output.=
            '<tr>'.
            '<td>'.$i.'</td>'.
            '<td>'.'</td>'.
            '<td>'.$value->name.'</td>'.
            '<td>'.'</td>'.
            '</tr>';  
            
        }
            return Response($output);
        
        }
    }
    public function export(Request $requests){
        if($requests->ajax()){
            $err = "Khong co du lieu";
            $output = "";
            $databen = $requests->ben;
            $datathang = $requests->thoigian;
            $data = Router::where('station_id','=',$databen)->get();
            Excel::create('Export Data',function($excel) use($data){
                $excel->sheet('Sheet 1',function($sheet) use($data){
                    $sheet->fromArray($data);
                });
            })->export('xlsx');
        }
    }
}
