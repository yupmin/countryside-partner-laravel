<?php


namespace App\Services;


interface DiaryInterface
{

    public function create($formData);
    public function getDiary($diary_srl);
    public function all();
    public function userDiary($user_srl);
}