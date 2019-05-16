<?php


namespace App\Services;


use App\Models\Mentee;
use JWTAuth;

class MenteeService
{

    private $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function create($menteeData)
    {
        $menteeDataArr = $menteeData->all();
        $menteeDataArr['profile_image'] = $this->fileUploadService->profileUpload($menteeData->file('profile_image'));
        $mentee = Mentee::create($menteeDataArr);

        $collection = collect($mentee)->put('token', JWTAuth::fromUser($mentee));

        return $collection;
    }



}