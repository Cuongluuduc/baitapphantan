<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route_car extends Model
{
     public $table = 'route_car';
    protected $fillable = [
        'name', 'time', 'router_id','driver_id','total_chair','car_route_id','time_data','id',
    ];
    public static function insertRouCar($router_id,$time,$time_data,$car_id){
      $data = new Route_car();
      $data->router_id = $router_id;
      $data->time = $time;
      $data->time_data = $time_data;
      $data->car_route_id =$car_id;
      $data->save(); 
    }
    public static function checkTimeRou($router_id,$time){
    	$count = 0;
    	$data = Route_car::all();
    	if(count($data)==0){
    		return true;
    	}else{
    		foreach ($data as $key => $value) {
    			if($value->router_id==$router_id&&$value->time==$time){
    				$count++;
    			}
    		}
    		if($count>0){
    			return false;
    		}else{
    			return true;
    		}
    	}
    }
    // public static function findidlt($name,$time){
    //   $id = "";
    //   $data = Route_car::all();
    //   foreach ($data as $key => $value) {
    //     if($data->name==$name&&$data->time==$time){
    //       $id = $data->id;
    //     }
    //   }
    //   return $id;
    // }
    // Hàm kiểm tra thòi gian xuất phát hợp lệ không
    public static function checktimee($router_id,$time){
      $count = 0;
      // $check = ""; 
      $timestrtoh = date('H',strtotime($time));
      $timestrtop = date('i',strtotime($time));
      $t = $timestrtoh*60 + $timestrtop;
      if($timestrtoh<5||$timestrtoh>19){
        return false;
      }else{
        $data = Route_car::where('router_id','=',$router_id)->get();
         foreach ($data as $key => $value) {
          $check = $value->time_data;
          $checkh = date('H',strtotime($check));
          $checkp = date('i',strtotime($check));
          $try = $checkh*60 + $checkp;
          if(abs($try-$t)<30){
            $count++;
          }
        }
        if($count==0){
          return true;
        }
        else {
          return false;
        } 
      }
    }
    // đưa router_id time tìm id lộ trình
    public static function findidltexcel($router_id,$time){
      $id = "";
      $data = Route_car::all();
      foreach ($data as $key => $value) {
        if($value->router_id==$router_id&&$value->time==$time){
          $id = $value->id;
        }
      }
      return $id;
    }
    public static function getcar_route_id($id){
      $car_route_id ="";
      $data = Route_car::where('id','=',$id)->get();
      foreach ($data as $key => $value) {
        if($value->id==$id){
           $car_route_id = $value->car_route_id;
        }
      }
      return $car_route_id;
    }
    public static function findid($router_id){
      $data = Route_car::all();
      $rou_car = array();
      foreach ($data as $key => $value) {
        if($value->router_id==$router_id){
          $rou_car[] = $value;
        }
      }
      return $rou_car;
    }
    public static function deleteRoutercar($id){
      $data = Route_car::find($id);
      $data->delete($id);
    }
    
}
