<?php

use Illuminate\Http\Request;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('main', array(
    'as' => 'main',
    'uses' => 'MainController@index'
));
Route::get('/v1/villages/{village_id}', array(
    'as' => 'v1.villages.village',
    'uses' => 'VillageController@village'
));


//Route::group(['middleware' => ''], function () {

    Route::group(['prefix' => 'v1'], function () {

        Route::any('member/join/', array(
            'as' => 'member.join',
            'uses' => 'MentoController@store'
        ));
    });
//});


