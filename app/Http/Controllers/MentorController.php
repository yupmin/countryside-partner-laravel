<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMentorRequest;
use App\Models\Mentor;
use App\Services\FileUploadService;
use Tymon\JWTAuth\Facades\JWTAuth;

class MentorController extends Controller
{
    /** @var FileUploadService */
    private $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    protected function index()
    {
        $mentors = Mentor::all();

        return $mentors;
    }

    protected function store(StoreMentorRequest $request)
    {
        $data = $request->all();
        $data['profile_image'] = $this->fileUploadService->uploadProfile($request->file('profile_image'));
        $mentor = Mentor::create($data);
        $mentor->setAttribute('token', JWTAuth::fromUser($mentor));

        return $mentor;
    }

    protected function view(Mentor $mentor)
    {
        return $mentor;
    }
}
