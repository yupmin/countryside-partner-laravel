<?php


namespace App\Services;


interface MentorInterface
{
    /**
     * @param Object $formData
     * @return mixed
     */
    public function create(Object $formData);

    /**
     * @param int $mentor_srl
     * @return mixed
     */
    public function getMentor(int $mentor_srl);
}
