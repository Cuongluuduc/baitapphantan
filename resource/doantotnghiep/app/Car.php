<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $table = 'car_lt';
    protected $fillable = [
        'name', 'quantity_chair', 'status','type',
    ];
    public static function insertCar($name,$quantity_chair,$type){
         $car = new Car();
         $car->name = $name;
         $car->quantity_chair = $quantity_chair;
         $car->type = $type;
         $car->save();
    }
    public static function editstatus($name){
    	$id="";
    	$car = Car::all();
    	foreach ($car as $key => $value) {
    		if($value->name==$name){
    			$id = $value->id;
    		}
    	}
    	$xe = Car::find($id);
    	$xe->status = 1;
    	$xe->save();
    }
    public static function findid($name){
    	$id="";
    	$car = Car::all();
    	foreach ($car as $key => $value) {
    		if($value->name==$name){
    			$id = $value->id;
    		}
    	}
    	return $id;
    }
    public static function getsoghe($id){
        $quantity_chair="";
        $data = Car::all();
        foreach ($data as $key => $value) {
            if($value->id==$id){
             $quantity_chair = $value->quantity_chair;    
            }
        }
        return $quantity_chair;

    }
    // Lấy xe lộ trình đã phân công vào tuyến
    public static function getCarOne(){
        $data = Car::where('type','=',1)->where('status','=',1)->where('status2','=', 0)->get();
        return $data;
    }
    // lấy xe đón khách
    public static function getCarTwo(){
        $data = Car::where('type','=',2)->where('status','=',1)->where('status2','=', 0)->get();
        return $data;
    }
    public static function upDateStatus($id){
        $find=Car::find($id);
        $find->status2=1;
        $find->save();
    }
    public static function upDateStatus2($id){
        $find=Car::find($id);
        $find->status2=0;
        $find->save();
    }
    // update trạng thái sau khi xóa bến tuyến
    public static function updatest($id){
        $data = Car::find($id);
        $data->status = 0;
        $data->save();
    }
    public static function deleteCar($id){
        $data = Car::find($id);
        $data->delete($id);
    }
    public static function sawstatus($id){
        $data = Car::where('id','=',$id)->get();
        $count = 0;
        foreach ($data as $key => $value) {
            if($value->status==0){
                $count++;
            }
        }
        if($count>0){
            return true;
        }else{
            return false;
        }
    }
}
