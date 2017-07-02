<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = 'admin';
    protected $fillable = [
        'id','gender', 'birthday', 'phone','address', 'graduation','user_id',
    ];
    public static function changestt($id,$phone,$gra){
    	$changestt = Admin::find($id);
    	$changestt->phone = $phone;
    	$changestt->graduation = $gra;
    	$changestt->save();

    }
}
