<?php


namespace App\Services;


use App\Models\Mentor;
use JWTAuth;

class MentorService
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

    public function create($mentorData)
    {
        $mentorDataArr = $mentorData->all();
        $mentorDataArr['profile_image'] = $this->fileUploadService->profileUpload($mentorData->file('profile_image'));
        $mentor = Mentor::create($mentorDataArr);
        $collection = collect($mentor)->put('token', JWTAuth::fromUser($mentor));

        return $collection;
    }


    /**
     * @param $mentor_srl
     * @return Mentor|Mentor[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getMentor($mentor_srl){

        $mentor = Mentor::with(['diaries' => function ($query){

            $query->orderBy('regdate', 'desc');//->paginate(15);

        }])->find($mentor_srl);

        return $mentor;
    }

}
