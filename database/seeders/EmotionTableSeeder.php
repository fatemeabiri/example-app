<?php

namespace Database\Seeders;

use App\Models\Emotion;
use Illuminate\Database\Seeder;

class EmotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       Emotion::factory(30)->create();

    }
}
