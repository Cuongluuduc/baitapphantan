<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverCar extends Model
{
   public $table = 'driver_car';
   public static function assign($driverID,$carID){
    	$driverCar = new DriverCar();
    	$driverCar->driver_id=$driverID;
    	$driverCar->car_id=$carID;
    	$driverCar->save();
    }
    public static function check($carID){
    	$count = 0;
    	$data = DriverCar::all();
    	foreach ($data as $key => $value) {
    		if($value->car_id==$carID){
    			$count++;
    		}
    	}
    	if ($count>0) {
    		return false;
    	}
    	else{
    		return true;
    	}
    }
    public static function deleteDriverCar($id){
        $data = DriverCar::find($id);
        $data->delete($id);
    }
    // driver_id tìm id Pcoong
    public static function getid($driver_id){
        $id ="";
        $data = DriverCar::all();
        foreach ($data as $key => $value) {
            if($value->driver_id==$driver_id){
                $id = $value->id;
            }
        }
        return $id;
    }
    public static function laylaixe_id($id){
        $driver_id ="";
        $data = DriverCar::all();
        foreach ($data as $key => $value) {
            if($value->id==$id){
                $driver_id = $value->driver_id;
            }
        }
        return $driver_id;
    }
    public static function getdriver2($id){
        $driver_id ="";
        $data = DriverCar::all();
        foreach ($data as $key => $value) {
            if($value->id==$id){
                $driver_id = $value->driver_id;
            }
        }
        return $driver_id;
    }
    public static function getcar_id($driver_id){
        $car_id ="";
        $data = DriverCar::all();
        foreach ($data as $key => $value) {
            if($value->driver_id==$driver_id){
                $car_id = $value->car_id;
            }
        }
        return $car_id;
    }
    public static function change($id,$driver_id){
        $data = DriverCar::find($id);
        $data->driver_id = $driver_id;
        $data->save();
    }
    public static function getdriver_id($car_id){
        $driver_id ="";
        $data = DriverCar::all();
        foreach ($data as $key => $value) {
            if($value->car_id==$car_id){
                $driver_id = $value->driver_id;
            }
        }
        return $driver_id;
    }
     public static function getphancong($car_id){
        $id ="";
        $data = DriverCar::all();
        foreach ($data as $key => $value) {
            if($value->car_id==$car_id){
                $id = $value->id;
            }
        }
        return $id;
    }
}
