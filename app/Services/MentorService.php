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
        $mentorDataArr = $mentorData->all();

        if(!is_null($mentorData->file('profile_image')))
        {
            $profile_image = $this->fileUploadProfile->upload($mentorData->file('profile_image'));
            $mentorDataArr['profile_image'] = $profile_image;
        }

        $mentor = Mentor::create($mentorDataArr);
        $collection = collect($mentor)->put('token', JWTAuth::fromUser($mentor));

        return $collection;
    }

}
