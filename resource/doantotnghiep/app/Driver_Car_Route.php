<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver_Car_Route extends Model
{
    public $table = 'driver_car_route';

    public static function assign($driverID,$carRouteID){
    	$driverCarRoute=new Driver_Car_Route();
    	$driverCarRoute->driver_id=$driverID;
    	$driverCarRoute->car_route_id=$carRouteID;
    	$driverCarRoute->save();
    }
}
