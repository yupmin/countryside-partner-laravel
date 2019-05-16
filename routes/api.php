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




//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});






Route::group(['middleware' => 'jwt.auth.custom'], function () {

    Route::group(['prefix' => 'v1'], function () {

        Route::post('diaries', array(
            'as' => 'diaries.store',
            'uses' => 'DiaryController@store'
        ));
    });
});


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
    Route::get('mentors/{mentor_srl}', array(
        'as' => 'mentors.mentor',
        'uses' => 'MentorController@index'
    ));
    Route::post('join/mentor', array(
        'as' => 'join.store',
        'uses' => 'MentorController@store'
    ));

    // Only 멘티
    Route::post('join/mentee', array(
        'as' => 'join.store',
        'uses' => 'MenteeController@store'
    ));

    // 회원의 영농일지 가져오기
    Route::get('diaries/{diary_id}', array(
        'as' => 'diaries.show',
        'uses' => 'DiaryController@show'
    ));

});


