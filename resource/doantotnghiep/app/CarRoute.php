<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarRoute extends Model
{
    public $table = 'car_route';
    protected $fillable = [
         'router_id', 'status','car_id',
    ];
    public static function insertCarRoute($router_id,$car_id){
    	$data = new CarRoute();
    	$data->router_id = $router_id;
    	$data->car_id = $car_id;
    	$data->save();
    }
    // Dua ra id cua xe thuoc lo trinh nao
    public static function findid($router_id,$car_id){
        $id = "";
        $data = CarRoute::all();
        foreach ($data as $key => $value) {
            if($value->router_id==$router_id&&$value->car_id==$car_id){
                $id = $value->id;
            }
        }
        return $id;
    }
    // xe lộ trình dc phân công
    public static function statusid($id,$status){
        $data = CarRoute::find($id);
        $data->status = 1;
        $data->save();
    }
    // xe lệ trình update status
    public static function updatestatus($id){
        $data = CarRoute::find($id);
        $data->status = 0;
        $data->save();
    }
    // xoas
    public static function deleteCarRoute($id){
        $data = CarRoute::find($id);
        $data->delete($id);
    }
    // đưa ra xe thuộc tuyến 
    public static function getCarRoute($router_id){
        $carrou = array();
        $data = CarRoute::all();
        foreach ($data as $key => $value) {
            if($value->router_id==$router_id){
                $carrou[] = $value;
            }
        }
        return $carrou;
    }
    public static function findcar_id($id){
        $car_id = "";
        $data = CarRoute::where('id','=',$id)->get();
        foreach ($data as $key => $value) {
            if($value->id==$id){
               $car_id = $value->car_id; 
            }
        }
        
        return $car_id;
    }

    public static function getAll(){
        return CarRoute::all();
    }
}
