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


    public function getMentor($mentor_srl){

        $mentor = Mentor::find($mentor_srl);

        return $mentor;

//        $mentor = Mentor::with(['diaries' => function ($query){
//
//            $query->orderBy('regdate', 'desc');//->paginate(15);
//
//        }])->find($mentor_srl);
//
//        $collection = collect($mentor);
//
//        $mentor = $collection->map(function ($item, $key) {
//
//            if($key == "diaries"){
//
////                foreach($item as $itemKey)
////                {
////                    $itemKey['contents'] = "hihddiasffsddsfadfdsfsdfsfasih";
////                    $item = $itemKey['contents'];
//////                    print_r($item);
////                }
////                print_r($item);
//
//            }
//
//            return $item;
//
//        });

    }

}
