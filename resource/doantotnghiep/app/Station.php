<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
  public $table = 'station';
  protected $fillable = [
        'name', 'ing', 'lat',
    ];
    public static function checkname($name){
    	$count=0;
    	$station=Station::all();
    	foreach ($station as $key => $value) {
    		if($value->name==$name){
    			$count++;
    		}
    	}
    	if($count>0){
    		return false;
    	} else{
    		return true;
    		
    	}
    }
    public static function  insertStation($name){
    	$ben = new Station();
    		$ben->name=$name;
    		$ben->save();
    }
    public static function getSationid($name){
    	$val="";
    	$data = Station::all();
    	foreach ($data as $key => $value) {
    		if($value->id==$name){
    			$val = $value->name;
    		}
    	}
    	return $val;
    }
    public static function editStation($id,$name){
        $findid = Station::find($id);
        $findid->name = $name;
        $findid->save();
    }
    public static function editslgve($id,$sove){
        $sl = 0;
        $data = Station::all();
        foreach ($data as $key => $value) {
            if($value->id==$id){
                $sl = $value->number + $sove;
            }
        }
        $da = Station::find($id);
        $da->number = $sl;
        $da->save();
    }
    public static function station_id($name){
        $val="";
        $data = Station::all();
        foreach ($data as $key => $value) {
            if($value->name==$name){
                $val = $value->id;
            }
        }
        return $val;
    }
   public static function deleteStation($id){
    $data = Station::find($id);
    $data->delete($id);
   }
}
