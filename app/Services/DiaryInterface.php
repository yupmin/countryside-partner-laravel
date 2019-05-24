<?php


namespace App\Services;


interface DiaryInterface
{

    /**
     * @param Object $formData
     * @return mixed
     */
    public function create(Object $formData);

    /**
     * @param int $diary_srl
     * @return mixed
     */
    public function getDiary(int $diary_srl);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $user_srl
     * @return mixed
     */
    public function userDiary(int $user_srl);
}
