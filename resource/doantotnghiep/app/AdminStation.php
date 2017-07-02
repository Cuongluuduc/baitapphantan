<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminStation extends Model
{
    public $table = 'admin_station';
    public static function insertadmin($gender,$phone,$birthday,$user_id,$station_id,$graduation){
         $data = new AdminStation();
         $data->gender = $gender;
         $data->phone = $phone;
         $data->birthday = $birthday;
         $data->user_id =$user_id;
         $data->station_id=$station_id;
         $data->graduation = $graduation;
         $data->save();
    }
    public static function edittt($id,$phone,$trd){
        $data = AdminStation::find($id);
        $data->phone = $phone;
        $data->graduation =$trd;
        $data->save();
    }
    public static function findiddriver($user_id){
        $id= "";
        $data = AdminStation::all();
        foreach ($data as $key => $value) {
            if($value->user_id==$user_id){
                $id = $value->id;
            }
        }
        return $id;
    }
    public static function findadmin($station_id){
        $id=array();
        $data = AdminStation::all();
        foreach ($data as $key => $value) {
            if($value->station_id==$station_id){
                $id[] = $value;
            }
        }
        return $id;
    }
    public static function deleteAd($id){
        $data = AdminStation::find($id);
        $data->delete($id);
    }
    public static function chechduynhat($station_id){
        $count = 0;
        $data = AdminStation::all();
        if (count($data)==0){
            return true;
        }else{
        foreach ($data as $key => $value) {
            if ($value->station_id==$station_id) {
                $count++;
            }
        }
        if ($count>0) {
          return false;
        }else{
            return true;
        }
    }
}
}