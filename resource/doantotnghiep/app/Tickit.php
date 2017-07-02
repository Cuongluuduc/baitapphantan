<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Router;
use App\Route_car;
class Tickit extends Model
{
    public $table = 'tickit';
     protected $fillable = [ 'routercar_id', 'date', 'cost', 'total_tickit','empty_tickit', ];
     public static function checkRoute($route_id){
     	$count = 0;
     	$rou = Route_car::all();
     	foreach ($rou as $key => $value) {
     		if($value->id==$route_id){
     			$count++;
     		}
     	}
     	if($count>0){
     		return true;
     	} else{
     		return false;
     	}
     }
     public static function checkdate($date){
     	$currentDate=date('Y-m-d');
        $datenow = strtotime($currentDate);
     	$timeCheck=strtotime(date("Y-m-d", strtotime($currentDate)) . " +5 day");
     	$date=date('Y-m-d',strtotime($date));
     	$timeDate=strtotime($date);
     	if($timeDate<=$timeCheck&&$timeDate>$datenow){
     		return true;
     	}else{
     		return false;
     	}
     }
     public static function checkRoute_Date($route_id,$date){
     	$count=0;
        $ve=Tickit::all();
        if(count($ve)==0){
            return true;
        }else{
            foreach ($ve as $u) {
            	$timeDate=strtotime(date('Y-m-d',strtotime($date)));
            	$timeData=strtotime(date('Y-m-d',strtotime($u->date)));
	            if($u->routercar_id==$route_id && $timeDate==$timeData){
	                $count++;
	            }
	        }
        }
        if($count>0){
            return false;
        }else{
            return true;
        }
     }
     public static function insertVe($route_id, $date, $cost, $total_tickit, $empty_tickit){
     	$ve = new Tickit();
     	$ve->routercar_id = $route_id;
     	$ve->date = $date;
     	$ve->cost = $cost;
     	$ve->total_tickit = $total_tickit;
     	$ve->empty_tickit = $empty_tickit;
     	$ve->save();
     }
     public static function check_empty_tickit($routercar_id,$soluong,$date){
        $timeDate=strtotime(date('Y-m-d',strtotime($date)));
        $empty_tickit = Tickit::where('routercar_id', '=', $routercar_id)->get();
        $value="";
        foreach ($empty_tickit as $etp) {
            $getDate=strtotime(date('Y-m-d',strtotime($etp->date)));
            if($getDate==$timeDate){
            $value=$etp->empty_tickit;
        }
        }
        if($soluong>0){
             $tr = $value-$soluong;
        if($tr<0){
            return false;
        } else{
            return true;
        }
    } else {
        return false;
    }
       
     }
     public static function insert_empty_tickit($routercar_id,$soluong,$date){
        $timeDate=strtotime(date('Y-m-d',strtotime($date)));
        $empty_tickit = Tickit::where('routercar_id', '=', $routercar_id)->get();
        $value="";
        $va="";
        foreach ($empty_tickit as $etp) {
            $getDate=strtotime(date('Y-m-d',strtotime($etp->date)));
            if($getDate==$timeDate){
                $value=$etp->id;
                $va=$etp->empty_tickit;       
             } 
            }
           
        $tr = $va-$soluong;
        // dd("kldfjg");
        $tickit = Tickit::find($value);
        $tickit->empty_tickit = $tr;
        $tickit->save();
     }
     public static function checkDated($date,$routercar_id){
        $currentDate=strtotime(date('Y-m-d'));
        $currentTime = (date('H'));
        $timeDate=strtotime(date('Y-m-d',strtotime($date)));
        $empty_tickit = Tickit::where('routercar_id', '=', $routercar_id)->get();
        $time_route = Route_car::where('id', '=', $routercar_id)->get();
        $value="";
        $gio="";
        foreach ($time_route as $key => $v) {
            $gio = $v->time_data;
        }
        $gio = date('H',strtotime($gio));
        $check = $gio-$currentTime;
        foreach ($empty_tickit as $etp) {
            $getDate=strtotime(date('Y-m-d',strtotime($etp->date)));
            if($getDate==$timeDate){
                $value=$etp->date;
            }
        }
        $time=strtotime(date('Y-m-d',strtotime($value)));
        if($timeDate==$time&&$timeDate>$currentDate){
            return true;
        }elseif ($timeDate==$time&&$timeDate==$currentDate) {
            if($check>=2){
                return true;
            }else{
                return false;
            }
            
        } else{
            return false;
        }
    }
    // public static function checkTime($time,$date){
    //     $timeDate=strtotime(date('Y-m-d',strtotime($date)));
    //     $currentTime = strtotime(date('H'));
    //     $time_route = Route_car::where('id', '=', $time)->get();
    //     $variable = Tickit::where('routercar_id', '=', $time)->get();
    //     $value="";
    //     foreach ($empty_tickit as $etp) {
    //         $value=$etp->time_data;
    //     }
    //     $ngay="";
    //     foreach ($variable as $key => $v) {
    //       $getDate=strtotime(date('Y-m-d',strtotime($v->date)));  
    //     }
    //    $val = strtotime(date('H',strtotime($value)));
    //    $check = $val-$currentTime;
    // }  
    public static function tickit_id($time,$date){
         $timeDate=strtotime(date('Y-m-d',strtotime($date)));
         $empty_tickit = Tickit::where('routercar_id', '=', $time)->get();
        $value="";
        foreach ($empty_tickit as $etp) {
            $getDate=strtotime(date('Y-m-d',strtotime($etp->date)));
            if($getDate==$timeDate){
            $value=$etp->id;
        }
                }
        return $value;
    } 
    public static function xacnhan($id){
        $data = Tickit::find($id);
        $data->status = 1;
        $data->save();
    }
    public static function checkxacnhan($id){
        $count =0;
        $data = Tickit::where('id','=',$id)->get();
        foreach ($data as $key => $value) {
            if($value->status==1){
                $count++;
            }
        }
        if ($count==0) {
            return true;
        }
        else{
            return false;
        }
    }
    public static function tinhsove($routercar_id,$thang){
        $data = Tickit::where('routercar_id','=',$routercar_id)->get();
        $s = 0;
        $giave = 0;
        $tongve = 0;
        foreach ($data as $key => $value) {
            if(date('m/Y',strtotime($value->date))==$thang&&$value->status==1){
               $tongve = $value->total_tickit - $value->empty_tickit;
               $s+=$tongve;
            }
        }
        return $s;
    }
    public static function tinhdoanhthu($routercar_id,$thang){
        $data = Tickit::where('routercar_id','=',$routercar_id)->get();
        $s = 0;
        $t = 1;
        $giave = 0;
        $tongve = 0;
        foreach ($data as $key => $value) {
            if(date('m/Y',strtotime($value->date))==$thang&&$value->status==1){
               $tongve = $value->total_tickit - $value->empty_tickit;
               $giave = $value->cost;
               $t = $tongve*$giave;
               $s+=$t;
            }
        }
        return $s;
    }
    public static function tinhsochuyen($routercar_id,$thang){
        $data = Tickit::where('routercar_id','=',$routercar_id)->get();
        $s = 0;
        $giave = 0;
        $tongve = 0;
        foreach ($data as $key => $value) {
            if(date('m/Y',strtotime($value->date))==$thang&&$value->status==1){
               
               $s++;
            }
        }
        return $s;
    }
    public static function timroucar($id){
        $routercar_id = "";
        $data = Tickit::where('id','=',$id)->get();
        foreach ($data as $key => $value) {
            $routercar_id = $value->routercar_id;
        }
        return $routercar_id;
    }
   public static function chuyenngayhn(){
    $today = date('Y-m-d');
    $data = Tickit::all();
    $count = 0;
    $tic = array();
    foreach ($data as $key => $value) {
        if($value->date==$today){
            $tic[] = $value;
        }
    }
    return $tic;
   }
}
