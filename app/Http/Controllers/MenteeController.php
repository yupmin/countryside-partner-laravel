<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenteeRequest;
use App\Models\Mentee;
use App\Services\FileUploadService;
use Tymon\JWTAuth\Facades\JWTAuth;

class MenteeController extends Controller
{
    /** @var FileUploadService */
    private $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    protected function store(StoreMenteeRequest $request)
    {
        $data = $request->all();

        $data['profile_image'] = $this->fileUploadService->uploadProfile($request->file('profile_image'));
        $mentee = Mentee::create($data);
        $mentee->setAttribute('token', JWTAuth::fromUser($mentee));

        return response()->success($mentee);
    }

    protected function lists()
    {

        $mentees = Mentee::all();
        return response()->success($mentees);
    }
}
