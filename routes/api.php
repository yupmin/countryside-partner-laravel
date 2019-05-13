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

//Route::group(['middleware' => 'jwt.auth'], function () {
//});

//Route::group(['middleware' => ''], function () {

    Route::group(['prefix' => 'v1'], function () {

        Route::get('main', array(
            'as' => 'main',
            'uses' => 'MainController@index'
        ));



        // Only 멘토
        Route::get('mentors', array(
            'as' => 'mentors',
            'uses' => 'MentorController@lists'
        ));
        Route::get('mentors/{mentor}', array(
            'as' => 'mentors.mentor',
            'uses' => 'MentorController@index'
        ));
        Route::post('join/mentor', array(
            'as' => 'join.mentor',
            'uses' => 'MentorController@store'
        ));
        // Only 멘티
        Route::post('join/mentee', array(
            'as' => 'join.mentee',
            'uses' => 'MenteeController@store'
        ));






    });
//});


