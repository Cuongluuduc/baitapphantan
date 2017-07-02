<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public $table = 'driver';
    protected $fillable = [
        'gender', 'phone', 'birthday','user_id','score','type','salary','experience','graduation',
    ];
    public static function insertdriver($gender,$phone,$birthday,$user_id,$type,$graduation){
             $data = new Driver();
             $data->gender = $gender;
             $data->phone = $phone;
             $data->birthday = $birthday;
             $data->user_id = $user_id;
             $data->type = $type;
             $data->graduation = $graduation;
             $data->save();
    }
    // tìm id driver biết user_id
    public static function findiddriver($user_id){
    	$id= "";
    	$data = Driver::all();
    	foreach ($data as $key => $value) {
    		if($value->user_id==$user_id){
    			$id = $value->id;
    		}
    	}
    	return $id;
    }
    public static function deletedriver($id){
        $d = Driver::find($id);
        $d->delete($id);
    }
    public static function timng($id){
        $user_id = "";
        $data = Driver::where('id','=',$id)->get();
        foreach ($data as $key => $value) {
            $user_id = $value->user_id;
        }
        return $user_id;
    }
    public static function edittt($id,$phone,$experience,$graduation){
       $data = Driver::find($id);
       $data->phone = $phone;
       $data->experience = $experience;
       $data->graduation = $graduation;
       $data->save();
    }

    /*
    laY danh sach lai xe loai 1 chua duoc phan cong
    */
    public static function getDriverOne(){
        $driver=Driver::where('type','=',1)
            ->where('status','=',0)->get();
            return $driver;
    }
    public static function getDriverTwo(){
        $driver=Driver::where('type','=',2)
            ->where('status','=',0)->get();
            return $driver;
    }
    public static function upDateStatus($id){
        $find=Driver::find($id);
        $find->status=1;
        $find->save();
    }
    public static function upDateStatuslai($id){
        $find=Driver::find($id);
        $find->status=0;
        $find->save();
    }
    public static function chamdiem($id,$soluot,$score){
        $data = Driver::where('id','=',$id)->get();
        $diemcu = 0;
        $soluotcu = 0;
        foreach ($data as $key => $value) {
            $diemcu = $value->score;
            $soluotcu = $value->soluot;
        }
        $tongdiemcu = $diemcu*$soluotcu;
        $tongdiemmoi = $tongdiemcu + $soluot*$score;
        $tongsoluot = $soluotcu + $soluot;
        $diemmoi = $tongdiemmoi/$tongsoluot;
        return $diemmoi;
    }
    public static function soluot($id,$soluot,$score){
        $data = Driver::where('id','=',$id)->get();
        $diemcu = 0;
        $soluotcu = 0;
        foreach ($data as $key => $value) {
            $diemcu = $value->score;
            $soluotcu = $value->soluot;
        }
        
        $tongsoluot = $soluotcu + $soluot;
        
        return $tongsoluot;
    }
    public static function updatevote($id,$soluot,$score){
        $data = Driver::find($id);
        $data->score = $score;
        $data->soluot = $soluot;
        $data->save();
    }
    public static function timtype($id){
        $type = "";
        $data = Driver::where('id','=',$id)->get();
        foreach ($data as $key => $value) {
            $type = $value->type;
        }
        return $type;
    }
}
