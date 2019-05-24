<?php


namespace App\Services;


use App\Models\Mentor;
use JWTAuth;

class MentorService implements MentorInterface
{

    private $fileUploadService;

    /**
     * MentorService constructor.
     * @param FileUploadService $fileUploadService
     */
    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * @param Object $mentorData
     * @return \Illuminate\Support\Collection
     */
    public function create(Object $mentorData)
    {
        $mentorDataArr = $mentorData->all();
        $mentorDataArr['profile_image'] = $this->fileUploadService->profileUpload($mentorData->file('profile_image'));
        $mentor = Mentor::create($mentorDataArr);
        $collection = collect($mentor)->put('token', JWTAuth::fromUser($mentor));

        return $collection;
    }


    /**
     * @param int $mentor_srl
     * @return mixed
     */
    public function getMentor(int $mentor_srl){

        $mentor = Mentor::find($mentor_srl);

        return $mentor;
    }

}
