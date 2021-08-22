<?php

namespace App\Exceptions;

use http\Env\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */

//    public function render($request, Throwable $exception)
//    {
//        if( $request->is('api/*')){
//            if ($exception instanceof ModelNotFoundException) {
//                $model = strtolower(class_basename($exception->getModel()));
//
//                return new JsonResponse([
//                        'data' => 'not found',
//                        'status' => 'error'
//                    ],404);//\Facade\FlareClient\Http\Response::HTTP_AUNAUTHORIZE
//
//            }
//            if ($exception instanceof NotFoundHttpException) {
//                return response()->json([
//                    'error' => 'Resource not found'
//                ], 404);
//
//            }
//        }
//    }
    public function register()
    {

        $this->renderable(function(NotFoundHttpException $e, $request) {
                if ($request->is('api/*')) {  //  if ($request->is('api/*'))

                    return new JsonResponse([
                        'data' => 'not found',
                        'status' => 'error'
                    ],404);//\Facade\FlareClient\Http\Response::HTTP_AUNAUTHORIZE
                }

        });
//        $this->renderable(function(NewException $e, $request) {
//                if ($request->is('api/*')) {  //  if ($request->is('api/*'))
//
//                    return new JsonResponse([
//                        'data' => 'new exception',
//                        'status' => 'error'
//                    ],404);//\Facade\FlareClient\Http\Response::HTTP_AUNAUTHORIZE
//                }
//
//        });
    }
}
