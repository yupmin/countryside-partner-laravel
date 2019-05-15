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
        if($menteeData->hasFile('profile_image'))
        {
            $profile_image = $this->fileUploadProfile->upload($menteeData->file('profile_image'));
            $menteeData = $menteeData->all();
            $menteeData['profile_image'] = $profile_image;
        }

        $mentor = Mentee::create($menteeData);

        $collection = collect($mentor)->put('token', JWTAuth::fromUser($mentor));

        return $collection;
    }

}