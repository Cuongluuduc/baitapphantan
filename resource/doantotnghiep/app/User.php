<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
class User extends Authenticatable 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'user';
    protected $fillable = [
        'name', 'email', 'password','level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function checkEmail($email){
        $count=0;
        $users=User::all();
        if(count($users)==0){
            return true;
        }else{
            foreach ($users as $key => $u) {
            if($u->email==$email){
                $count++;
            }
        }
        if($count>0){
            return false;
        }else{
            return true;
        }
        }
        
    }
    public static function insertNV($name,$email,$password,$level){
        $nv=new User();
        $nv->name=$name;
        $nv->email=$email;
        $nv->password=bcrypt($password);
        $nv->level=$level;
        $nv->save();
    }
    public static function insertQL($name,$email,$password){
        $nv=new User();
        $nv->name=$name;
        $nv->email=$email;
        $nv->password=bcrypt($password);
        $nv->level=3;
        $nv->save();
    }
    public static function insertguest($name,$email){
        $pass="123456";
        $nv=new User();
        $nv->name=$name;
        $nv->email=$email;
        $nv->level=0;
        $nv->password=bcrypt($pass);
        $nv->save();
    }
    public static function user_id($email){
        $value="";
        $data = User::where('email','=',$email)->get();
        foreach ($data as $key => $da) {
            if($da->email==$email){
                $value = $da->id;
            }
            return $value;
        }
    }
    public static function deleteuser($id){
        $data = User::find($id);
        $data->delete($id);
    }
    public static function changePass($id,$password){
        $data = User::find($id);
        $data->password = bcrypt($password);
        $data->save();
    }
    public static function xacnhanmk($id,$password){
         $count = 0;
         $data = User::where('id','=',$id);
         foreach ($data as $key => $value) {
             if($value->password==$password){
                $count++;
             }
         }
         if($count>0){
            return true;
         }
         else{
            return false;
         }
    }
    public static function timten($id){
       $name = "";
       $data = User::where('id','=',$id)->get();
       foreach ($data as $key => $value) {
           $name = $value->name;
       }
       return $name;
    }
}
