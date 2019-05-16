<?php


namespace App\Services;


interface DiaryInterface
{

    public function create($formData);
    public function get(int $diary_srl);
    public function all();
}