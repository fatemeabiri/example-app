<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\NewException;
use App\Http\Controllers\Controller;
use App\Models\Emotion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use \App\Http\Resources\Emotion as emore;
use Illuminate\Support\Facades\Response;
use mysql_xdevapi\Exception;
use phpseclib3\Exception\FileNotFoundException;

class EmotionController extends BaseController
{
    //

    public function __construct()
    {
//        Why do we have that first? Think of it as the biggest gat
//    $this->middleware('auth:sanctum’)->only('show', 'store', 'update', 'destroy');


//    $this->middleware('can:show,method')->only('show');

//        if( Auth::user()->can('update', $this->company ) ){
//            return $this->persistUpdates();
//        }

//    $this->middleware('can:store,App\Models\BrewMethod')->only('store');
//    $this->middleware('can:update,method')->only('update');
//    $this->middleware('can:delete,method')->only('delete');
//
}
    public function index()
    {
//        $emotions = Emotion::find(1);
//        $emotions = Emotion::all();
        throw new ModelNotFoundException();
        $emotions = Emotion::paginate(5);
//dd($emotions);
//        return $this->sendResponse(\App\Http\Resources\Emotion::collection($emotions), 'بازگشت موفق.');
//        return response()->json(\App\Http\Resources\Emotion::collection($emotions), 200);
//         return \App\Http\Resources\Emotion::collection($emotions);//RETURN PAGING LINK
//        Response::json(\App\Http\Resources\Emotion::collection($emotions), 200);
//        return $this->sendResponse(new emore($emotions), 'بازگشت موفق.');

    }
    public function find(Emotion $emotion){
        throw  new NewException();
        return new emore($emotion);
    }
}
