<?php

namespace Database\Factories;

use App\Models\Emoji;
use App\Models\Emotion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Emotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'emotion_date'=>now(),
            'emotion_text'=>$this->faker->paragraph(20),
            'emotion_title'=>$this->faker->sentence(10),
            'user_id'=>User::factory(User::class),
            'emoji_key'=> function(){
                $arr=Emoji::all()->pluck('emoji_key');
                $key=array_rand($arr->toArray());
                return($arr[$key]);
            },

        ];
    }
}
