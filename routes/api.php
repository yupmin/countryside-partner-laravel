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

        Route::post('mentors/diaries', array( // 멘토 - 영농일지 작성
            'as' => 'mentors.diaries.store',
            'uses' => 'MentorDiaryController@store'
        ));
    });
});


Route::group(['prefix' => 'v1'], function () {

    Route::get('main', array(
        'as' => 'main',
        'uses' => 'MainController@index'
    ));



    Route::get('mentors', array( // 멘토 - 전체 회원 조회
        'as' => 'mentors',
        'uses' => 'MentorController@lists'
    ));
    Route::get('mentors/{mentor_srl}', array( // 멘토 - 프로필 조회
        'as' => 'mentors.mentor',
        'uses' => 'MentorController@index'
    ));
    Route::get('diaries-mentors', array( //  멘토 - 영농일지 전체 조회
        'as' => 'mentors.diaries.index',
        'uses' => 'MentorDiaryController@index'
    ));
    Route::get('diaries-mentors/{diary_id}', array( //  멘토 - 영농일지 선택 조회
        'as' => 'mentors.diaries.show',
        'uses' => 'MentorDiaryController@show'
    ));



    Route::post('join/mentor', array( // 멘토 - 회원가입
        'as' => 'join.store',
        'uses' => 'MentorController@store'
    ));
    Route::post('join/mentee', array( // 멘토 - 회원가입
        'as' => 'join.store',
        'uses' => 'MenteeController@store'
    ));



});


