<?php


Route::post('users/mento', array(
    'as' => 'users.mento',
    'uses' => 'MentoController@store'
));

