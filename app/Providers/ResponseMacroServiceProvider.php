<?php

namespace App\Providers;

use App\Exceptions\MeteoException;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 실패일때
        Response::macro('error', function(MeteoException $e)
        {

            $request = app(\Illuminate\Http\Request::class);

            $response = [

                'stat' => 0,
                'error' => [

                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];

            if(!empty($request->get('callback'))){

                return Response()->json($response)->setCallback( $request->get('callback') );

            }else{

                return Response()->json($response);
            }
        });

        // 성공일때
        Response::macro('success', function ($result = null) {

            $response = [
                'stat' => 0,
                'response' => new \stdClass(),
            ];

            if(!empty($result)) $response['response'] = $result;

            return Response()->json($response);

        });
    }
}
