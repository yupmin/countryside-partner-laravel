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



/*
 --------------------------------------------------------------------------
 | OPEN API CALL
 --------------------------------------------------------------------------
 */
Route::get('openapi/machines', array( //
    'as' => 'openapi.machines',
    'uses' => 'OpenApiController@machines'
));

Route::get('openapi/dictionary', array( //
    'as' => 'openapi.dictionary',
    'uses' => 'OpenApiController@dictionary'
));

Route::group(['prefix' => 'v1'], function () {
    Route::get('main', array(
        'as' => 'main',
        'uses' => 'MainController@index'
    ));
    Route::get('mentors', array( // 멘토 - 전체 회원 조회
        'as' => 'mentors',
        'uses' => 'MentorController@index'
    ));
    Route::get('mentors/{mentor_id}', array( // 멘토 - 프로필 조회
        'as' => 'mentors.mentor',
        'uses' => 'MentorController@view'
    ));

    Route::get('diaries-mentors/articles', array( //  멘토 - 영농일지 전체 조회
        'as' => 'diaries-mentors.articles.index',
        'uses' => 'MentorDiaryController@index'
    ));
    Route::get('diaries-mentors/articles/{diary_id}', array( //  멘토 - 영농일지 선택 조회
        'as' => 'diaries-mentors.articles.show',
        'uses' => 'MentorDiaryController@show'
    ));
    Route::get('diaries-mentors/{mentor_srl}/articles', array( //  선택 된 멘토의 영농일지
        'as' => 'mentors.diaries.mentor.articles.show',
        'uses' => 'MentorDiaryController@mentorArticles'
    ));

    Route::post('join/mentor', array( // 멘토 - 회원가입
        'as' => 'join.store',
        'uses' => 'MentorController@store'
    ));
    Route::post('join/mentee', array( // 멘토 - 회원가입
        'as' => 'join.store',
        'uses' => 'MenteeController@store'
    ));

    // NEW API
    Route::post('memo', array( // 쪽지보내기
        'as' => 'memo',
        'uses' => 'MentorController@store'
    ));
    Route::get('memo/{user_id}', array( // 내 쪽지조회
        'as' => 'memo',
        'uses' => 'MentorController@index'
    ));
});


