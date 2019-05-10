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


//Route::group(['middleware' => ''], function () {

    Route::group(['prefix' => 'v1'], function () {

        Route::get('main', array(
            'as' => 'main',
            'uses' => 'MainController@index'
        ));

        Route::get('mentors', array(
            'as' => 'mentors',
            'uses' => 'MentorController@lists'
        ));

        Route::get('mentors/{mentor}', array(
            'as' => 'mentors.mentor',
            'uses' => 'MentorController@index'
        ));


        Route::post('users/mentor', array(
            'as' => 'users.mentor',
            'uses' => 'MentorController@store'
        ));


    });
//});


