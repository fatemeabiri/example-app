<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public $comment_id;
//    public $post_id; in redis it does not need!
    public $body;
    public $created_at;
    public $user_id;
    public $like;
}
