<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Station;
class Router extends Model
{
    public $table = 'router';
    protected $fillable = [
        'name', 'ing', 'lat','station_id','station_dich','total_time',
    ];
    public static function check($name,$namep){
    	$count=0;
    	$data = Router::all();
    	foreach ($data as $key => $value) {
    		if($value->name==$name||$value->name==$namep){
    			$count++;
    		}
    	}
            if($count>0){
            	return false;
            }
            else{
            	return true;
            }
    }
    public static function insertRoute($name,$station_id,$station_dich,$total_time){
    	$data = new Router();
    	$data->name = $name;
    	$data->station_id = $station_id;
    	$data->station_dich = $station_dich;
        $data->total_time = $total_time;
    	$data->save();
    }
    // đưa ra id tuyến dựa vào tên
    public static function findidname($name){
      $id = "";
      $data = Router::all();
      foreach ($data as $key => $value) {
         if($value->name==$name){
          $id = $value->id;
         }
       } 
       return $id;
    }
    // Tìm trạm ngược lại
    public static function swap($id){
       $finid ="";
       $car = Router::find($id);
       $xp = $car->station_id;
       $dich = $car->station_dich;
       $findcar = Router::all();
       foreach ($findcar as $key => $value) {
           if($value->station_id==$dich&&$value->station_dich==$xp){
            $finid = $value->id;
           }
       }
       return $finid;
    }
    public static function editRoute($id,$total_time){
      $finid = Router::find($id);
      $finid->total_time = $total_time;
      $finid->save();
    }
    // truyền id đưa ra tổng thời gian xe chạy
    public static function findtotaltime($id){
      $data = Router::find($id);
      $total_time = $data->total_time;
      
      return $total_time;
    }
    // Hàm cộng giờ
    public static function addh($timea,$timeb){
       $timeah = date('H',strtotime($timea));
       $timeap = date('i',strtotime($timea));
       $timebh = date('H',strtotime($timeb));
       $timebp = date('i',strtotime($timeb));
       $timedata = $timeap + $timebp;
       if($timedata<60){
        $timedatah = $timeah + $timebh;
       }else{
        $timedata = $timedata - 60;
        $timedatah = $timeah + $timebh + 1;
       }
       return $timedatah.':'.$timedata;
    }
    // tìm tuyến có xuất phát bến
    public static function findid($station_id){
      $id = array();
      $data = Router::all();
      foreach ($data as $key => $value) {
         if($value->station_id==$station_id){
          $id[] = $value;
         }
       } 
       return $id;
    }
    public static function deleteRouter($id){
      $data = Router::find($id);
      $data->delete($id);
    }
    
}
