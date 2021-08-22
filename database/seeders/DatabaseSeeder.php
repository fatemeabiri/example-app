<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
         $this->call([EmojiTableSeeder::class  //1: use for my special data : my policy to import
                    ,EmotionTableSeeder::class //2:
         ]);


    }
}
