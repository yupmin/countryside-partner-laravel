<?php


namespace App\Services;


interface MentorInterface
{
    public function create(Object $formData);
    public function getMentor(int $mentor_srl);
}
