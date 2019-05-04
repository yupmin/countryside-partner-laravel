<?php


Route::post('users/mentor', array(
    'as' => 'users.mentor',
    'uses' => 'MentorController@store'
));

