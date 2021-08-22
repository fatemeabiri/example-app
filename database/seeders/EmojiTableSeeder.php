<?php

namespace Database\Seeders;

use App\Models\Emoji;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class EmojiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {


        Emoji::truncate();
        Emoji::insert([
               ['Emoji_shape'=>'far fa-grin-beam-sweat	', 'Emoji_name'=>'خوشحالم','Emoji_weight'=>'10'],
               ['Emoji_shape'=>'fas fa-grin-beam	', 'Emoji_name'=>'ذوق زدم ','Emoji_weight'=>'10'],
               ['Emoji_shape'=>'fas fa-angry', 'Emoji_name'=>'عصبانیم','Emoji_weight'=>'-10'],
               ['Emoji_shape'=>'far fa-grimace	', 'Emoji_name'=>'خجالت کشیدم','Emoji_weight'=>'-3'],
               ['Emoji_shape'=>'far fa-surprise	', 'Emoji_name'=>'متعجبم','Emoji_weight'=>'0'],
               ['Emoji_shape'=>'far fa-meh-rolling-eyes	', 'Emoji_name'=>'دو دلم','Emoji_weight'=>'-1'],
               ['Emoji_shape'=>'far fa-sad-cry	', 'Emoji_name'=>'گریه میخوام','Emoji_weight'=>'-9'],
               ['Emoji_shape'=>'far fa-frown	', 'Emoji_name'=>'ناراحتم','Emoji_weight'=>'-3'],
               ['Emoji_shape'=>'far fa-sad-tear', 'Emoji_name'=>'افسردم','Emoji_weight'=>'-10'],

            ]);



    }
}
