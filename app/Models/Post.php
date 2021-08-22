<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   // use HasFactory;

    //{
    //"id" => "2"
    //"body" => "foo bar"
    //"user" => "sasan"
    //"created_at" => "2020-03-09 16:21:20"
    //"user_id" => 1
    //"Like" => 0
    //}

 public $post_id;
 public $body;
 public $created_at;
 public $user_id;
 public $like;



}
