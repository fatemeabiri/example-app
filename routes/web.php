<?php

use App\Models\Emotion;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\emoji\EmojiController;
use \App\Http\Controllers\site\EmojiController as emoji;
use \App\Http\Controllers\site\EmotionController;
use \App\Http\Controllers\admin\AdminController;
use App\Http\Middleware\AdminMiddleware;
use \App\Http\Controllers\HomeController;
use \Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\site\PostController;
use \App\Http\Controllers\site\CommentController;
//URI: is my  definition .. every thing can be: so: we use / to readable !
/*RESOURCE ROUTING PATTERN :
Route::resource('photos', PhotoController::class);
GET	/photos     	        index	photos.index
GET	/photos/create	        create	photos.create
POST	/photos     	    store	photos.store
GET	/photos/{photo} 	    show	photos.show
GET	/photos/{photo}/edit    edit	photos.edit
PUT/PATCH	/photos/{photo}	update	photos.update
DELETE	/photos/{photo}	    destroy	photos.destroy
*/

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('/home');
Route::get('/user',[HomeController::class,'userprofile'])
    ->name('user_dashboard')
    ->middleware(['auth','user']);

Route::group([ 'as'=>'admin.',//name='admin.emojis.index'
                'prefix'=>'admin',
               'middleware'=>['auth','admin'], //all in controller constructor
                ],
                function(){
                  Route::get('/panel', [HomeController::class, 'adminpanel'])->name('admin_dashboard');
                  Route::resource('emojis', EmojiController::class);

});
Route::group([ 'as'=>'emotions.',//name='emotions.emojis.index'
                'prefix'=>'emotions',
            ],function () {
                Route::get('/{emojikey}', [EmotionController::class, 'showByEmojiKey']);//guest
                Route::get('/', [EmotionController::class, 'index']);//guest
                Route::get('/create/{emojikey}', [EmotionController::class, 'create']);//user
                Route::get('/{emotion}/edit', [EmotionController::class, 'edit']);//user
                Route::post('/', [EmotionController::class, 'store']);//user
                Route::put('/{emotion}', [EmotionController::class, 'update']);//user
                Route::delete('/{emotion}', [EmotionController::class, 'destroy']);//user
});

Route::group(['as'=>'posts.',
                'prefix'=>'posts',

         ],function (){

    Route::put('/{postid}',[PostController::class,'update']);
    Route::get('/',[PostController::class,'index']);
    Route::post('/',[PostController::class,'store']);
    Route::get('/create/',[PostController::class,'create']);
    Route::get('/{postid}/edit',[PostController::class,'edit']);
    Route::delete('/{postid}', [PostController::class, 'destroy']);//user
    Route::get('/{postid}', [PostController::class, 'show']);//user ://comment index


});
Route::group(['as'=>'comments.',
                'prefix'=>'comments',
                'middleware'=>['auth'], //all in controller constructor


],function (){

//    Route::put('/{comid}',[CommentController::class,'update']);
    Route::post('/',[CommentController::class,'store']);
    Route::get('/create/',[CommentController::class,'create']);
//    Route::get('/{comid}/edit',[CommentController::class,'edit']);
    Route::delete('/{comid}', [CommentController::class, 'destroy']);//user

});















//TEST CASE
Route::get('/testview',function() {
   // $emotions = Emotion::where(['emoji_key', 2])->orderBy('emotion_date', 'desc');
//    $emotions=Emotion::all()->where('emoji_key','=',5);
    if(route('admin.emojis.index'))
        echo "hi";
    else
        echo "by";

    }
);


//Route::resource('faq', 'ProductFaqController', [
//    'names' => [
//        'index' => 'faq',
//        'store' => 'faq.new',
//        // etc...
//    ]
//]);
//
//    Route::get('/emojis',[EmojiController::class,'index']);
//    Route::get('emojis/create',[EmojiController::class,'create']);
//    Route::post('/emojis',[EmojiController::class,'store']);
//    Route::get('/emojis/{emoji}/edit',[EmojiController::class,'edit']);
//    Route::put('/emojis/{emoji}',[EmojiController::class,'update']);
//    Route::delete('/emojis/{emoji}',[EmojiController::class,'destroy']);
