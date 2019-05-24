<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof TokenExpiredException) {
            // TODO : 이렇게 하지마세요. IDE 상에 노란색이면 뭔가 제대로 코딩 되지 않았다는 얘기입니다.

            return response()->custom_error_token($exception->getCode(), $exception->getMessage());
        // TODO : PSR-2 보면 이렇게 코딩하지 말라고 나와 있을 껍니다.
        }else if($exception instanceof TokenInvalidException){

            return response()->custom_error_token($exception->getCode(), $exception->getMessage());

        }else if($exception instanceof JWTException){

            return response()->custom_error_token($exception->getCode(), $exception->getMessage());
        }



        if($exception instanceof MeteoException)
        {

            return response()->error($exception);

        }
        return parent::render($request, $exception);
    }
}
