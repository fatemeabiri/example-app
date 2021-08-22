<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emoji extends Model
{
    use HasFactory;
    protected $table = 'emojies';
    protected  $primaryKey = 'emoji_key';
    protected  $fillable=['emoji_shape','emoji_name','emoji_weight'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emotions(){
        return $this->hasMany(Emotion::class,'emoji_key','emoji_key');
    }

    //
    // get detail by id
//    static function detail($id)
//    {
//        return self::find($id)->toArray();
//    }
//
//    // get list by condition
//    static function list($name = '')
//    {
//        if ( !empty($name) ) return self::where('name', 'LIKE', $name)->get()->toArray();
//        else return self::all()->toArray();
//    }

//Company::detail(2); or Company::list('Company 1')





}
