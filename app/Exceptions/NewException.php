<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NewException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {

        if ($request->is('api/*')) {  //  if ($request->is('api/*'))

            return new JsonResponse([//return REspons
                'data' => 'new exception'.'=>'.$request->emotion->emotion_key,
                'status' => 'error'
            ],Response::HTTP_EXPECTATION_FAILED);//\Facade\FlareClient\Http\Response::HTTP_AUNAUTHORIZE
        }

    }

    //        public function context() //to add data
//    {
//        return ['order_id' => $this->orderId];
//    }
//        public function report()  ///to log
//    {
//        //    return false;
//    }
    //
}
