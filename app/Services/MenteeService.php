<?php


namespace App\Services;


use App\Models\Mentee;
use JWTAuth;

class MenteeService implements MenteeInterface
{

    private $fileUploadService;

    /**
     * MenteeService constructor.
     * @param FileUploadService $fileUploadService
     */
    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * @param Object $menteeData
     * @return \Illuminate\Support\Collection
     */
    public function create(Object $menteeData)
    {
        $menteeDataArr = $menteeData->all();
        $menteeDataArr['profile_image'] = $this->fileUploadService->profileUpload($menteeData->file('profile_image'));
        $mentee = Mentee::create($menteeDataArr);

        $collection = collect($mentee)->put('token', JWTAuth::fromUser($mentee));

        return $collection;
    }



}
