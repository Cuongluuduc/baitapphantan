<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
     public $table = 'work';
     public static function insertkhach($tickit_id,$guest_id){
     	$data = new Work();
     	$data->tickit_id = $tickit_id;
     	$data->guest_id = $guest_id;
     	$data->save();
     }
     public static function insertpc($id,$drivercar){
     	$data = Work::find($id);
     	$data->drivercar_id = $drivercar;
     	$data->save();
     }
     public static function checkdriver($id){
     	$count = 0;
     	$data = Work::where('id','=',$id)->get();
     	foreach ($data as $key => $value) {
     		if($value->drivercar_id==0){
     			$count++;
     		}
     	}
     	if ($count>0) {
     		return true;
     	}else {
     		return false;
     	}
     }
     public static function finddriver($guest_id,$tickit_id){
        $drivercar_id = "";
        $guest = Work::all();
        foreach ($guest as $key => $value) {
            if($value->guest_id==$guest_id&&$value->tickit_id==$tickit_id){
                $drivercar_id = $value->drivercar_id;
            }
        }
        return $drivercar_id;
    }
     public static function checkdriverr($guest_id,$tickit_id){
        $drivercar_id = "";
        $guest = Work::all();
        foreach ($guest as $key => $value) {
            if($value->guest_id==$guest_id&&$value->tickit_id==$tickit_id){
                $drivercar_id = $value->drivercar_id;
            }
        }
        if($drivercar_id==0){
          return false;
        }else{
          return true;
        }
    }
}
