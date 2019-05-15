<?php


namespace App\Services;


use App\Models\Mentor;
use JWTAuth;

class MentorService
{

    private $fileUploadProfile = null;

    public function __construct(FileUploadProfile $fileUploadProfile)
    {
        $this->fileUploadProfile = $fileUploadProfile;
    }

    public function create($mentorData)
    {
        if(!is_null($mentorData->file('profile_image')))
        {
            $profile_image = $this->fileUploadProfile->upload($mentorData->file('profile_image'));
            $mentorData = $mentorData->all();
            $mentorData['profile_image'] = $profile_image;
        }

        $mentor = Mentor::create($mentorData);

        $collection = collect($mentor)->put('token', JWTAuth::fromUser($mentor));

        return $collection;
    }

}