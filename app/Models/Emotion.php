<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    use HasFactory;

    protected  $primaryKey = 'emotion_key';
    protected  $fillable=['emotion_title','emotion_text','user_id','emoji_key','emotion_date'];

    public function emoji(){
       return $this->belongsTo(Emoji::class,'emoji_key','emoji_key');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }


}
