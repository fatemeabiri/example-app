<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('upload', [\App\Http\Controllers\Api\UploaderContlroller::class, 'upload']);
Route::post('/register',[\App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/login',[\App\Http\Controllers\Api\AuthController::class,'login']);
Route::get('/emotions/{emotion}',[\App\Http\Controllers\Api\EmotionController::class,'find']);
Route::middleware('auth:api')->group(function(){

   Rout:: get('/emotions',[ \App\Http\Controllers\Api\EmotionController::class,'index']);
});

//Route::middleware('auth:sanctum')->get('/emotions',[ \App\Http\Controllers\Api\EmotionController::class,'index']);
