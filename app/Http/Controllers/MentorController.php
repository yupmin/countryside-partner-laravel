<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentoJoin;
use App\Models\Mentor;
use App\Services\FileUploadProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MentorController extends Controller
{

    /**
     * 멘토 가입
     * @param MentoJoin $request
     * @param FileUploadProfile $fileUploadProfile
     * @return mixed
     */

    protected function store(MentoJoin $request, FileUploadProfile $fileUploadProfile){

        $validated = $request->validated();
        $validated['profile_image'] = $request->hasFile('profile_image') ? $fileUploadProfile->upload($request->file('profile_image')) : "";
        Mentor::create($validated);

        return Response::success();
    }


    protected function index($mentor){

        $mentor = Mentor::findOrFail($mentor);
        return Response::success($mentor);
    }

    protected function lists(){

        $mentors = Mentor::all();
        return Response::success($mentors);
    }


}
