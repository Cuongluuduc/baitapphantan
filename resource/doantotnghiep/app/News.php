<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     public $table = 'tintuc';
     public static function insert($title,$content){
     	$data = new News();
     	$data->title = $title;
     	$data->content = $content;
     	$data->admin_id = 1;
     	$data->save();
     }
}
