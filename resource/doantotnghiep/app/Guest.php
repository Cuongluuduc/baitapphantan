<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public $table = 'guest';
    protected $fillable = [
        'number', 'phone', 'status','user_id','tickit_id',
    ];
    public static function insertGuest($number,$phone,$status,$user_id,$tickit_id,$pickupcar_id){
    	$guest = new Guest();
    	$guest->number=$number;
    	$guest->phone=$phone;
    	$guest->status=$status;
    	$guest->user_id=$user_id;
    	$guest->tickit_id=$tickit_id;
    	$guest->pickupcar_id=$pickupcar_id;
    	$guest->save();
    }
    public static function deleteGuest($id){
        $guest = Guest::find($id);
        $guest->delete($id);
    }
    public static function finduser($user_id){
        $id = "";
        $guest = Guest::all();
        foreach ($guest as $key => $value) {
            if($value->user_id==$user_id){
                $id = $value->id;
            }
        }
        return $id;
    }
    public static function finduser2($user_id,$tickit_id){
        $id = "";
        $guest = Guest::all();
        foreach ($guest as $key => $value) {
            if($value->user_id==$user_id&&$value->tickit_id==$tickit_id){
                $id = $value->id;
            }
        }
        return $id;
    }
    public static function xacnhan($id){
        $data = Guest::find($id);
        $data->status = 1;
        $data->save();
    }
    public static function checkxacnhan($id){
        $data = Guest::where('id','=',$id)->get();
        $count = 0;
        foreach ($data as $key => $value) {
            if($value->status==1){
                $count++;
            }
        }
        if($count>0){
            return true;
        }else{
            return false;
        }
    }
    public static function checkvote($id){
        $data = Guest::where('id','=',$id)->get();
        $count = 0;
        foreach ($data as $key => $value) {
            if($value->vote==0){
                $count++;
            }
        }
        if($count>0){
            return true;
        }else{
            return false;
        }
    }
    public static function updatevote($id){
        $data = Guest::find($id);
        $data->vote = 1;
        $data->save();
    }
    public static function timsoluot($id){
        $data = Guest::where('id','=',$id)->get();
        $sove = "";
        foreach ($data as $key => $value) {
            $sove = $value->number;
        }
        return $sove;
    }
}
