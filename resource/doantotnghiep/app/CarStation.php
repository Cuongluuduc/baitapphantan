<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarStation extends Model
{
    public $table = 'car_station';
    protected $fillable = [
         'station_id','car_id',
    ];
    public static function insertCarStation($station_id,$car_id){
    	$data = new CarStation();
    	$data->station_id = $station_id;
    	$data->car_id = $car_id;
    	$data->save();
    }
    public static function findCarStation($station_id){
        $car = array();
        $data = CarStation::all();
        foreach ($data as $key => $value) {
            if($value->station_id==$station_id){
                $car[] = $value;
            }
        }
        return $car;
    }
    public static function deleteCarStation($id){
        $data = CarStation::find($id);
        $data->delete($id);
    }
}
