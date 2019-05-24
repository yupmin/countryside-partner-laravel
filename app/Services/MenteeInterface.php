<?php


namespace App\Services;


interface MenteeInterface
{
    /**
     * @param Object $formData
     * @return mixed
     */
    public function create(Object $formData);
}
