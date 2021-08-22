<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('emotions',function (Blueprint $table){
            $table->id('emotion_key');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('emoji_key');
            $table->foreign('emoji_key')->references('emoji_key')->on('emojies')->onDelete('cascade');
            $table->string('emotion_title');
            $table->text('emotion_text');
            $table->date('emotion_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('emotions');
    }
}
