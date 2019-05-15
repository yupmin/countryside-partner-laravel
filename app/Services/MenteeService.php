<?php


namespace App\Services;


use App\Models\Mentee;
use JWTAuth;

class MenteeService
{

    private $fileUploadProfile = null;

    public function __construct(FileUploadProfile $fileUploadProfile)
    {
        $this->fileUploadProfile = $fileUploadProfile;
    }

    public function create($menteeData)
    {
        $menteeDataArr = $menteeData->all();

        if(!is_null($menteeData->file('profile_image')))
        {
            $profile_image = $this->fileUploadProfile->upload($menteeData->file('profile_image'));

            $menteeDataArr['profile_image'] = $profile_image;
        }

        $mentee = Mentee::create($menteeDataArr);

        $collection = collect($mentee)->put('token', JWTAuth::fromUser($mentee));

        return $collection;
    }

}