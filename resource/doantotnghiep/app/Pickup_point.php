<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup_point extends Model
{
    public $table = 'pickup_point';
    protected $fillable = [
        'name', 'ing', 'lat','station_id',
    ];
    public static function checkname($name){
    	$count = 0;
    	$data = Pickup_point::all();
    	foreach ($data as $key => $value) {
    		if($value->name==$name){
    			$count++;
    		}
    	}
    	if($count>0){
    		return false;
    	}else{
    		return true;
    	}
    }
    public static function insertPickup($station_id,$name){
        $data = new Pickup_point();
        $data->station_id = $station_id;
        $data->name = $name;
        $data->save();
    }
    public static function deletePoint($id){
        $data = Pickup_point::find($id);
        $data->delete($id);
    }
    public static function findstation($station_id){
        $pick = array();
        $data = Pickup_point::all();
        foreach ($data as $key => $value) {
            if($value->station_id==$station_id){
                $pick[] = $value;
            }
        }
        return $pick;
    }
    public static function fixPickupp($id,$name){
        $data = Pickup_point::find($id);
        $data->name = $name;
        $data->save();
    }
}
