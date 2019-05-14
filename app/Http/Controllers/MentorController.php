<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentoJoin;
use App\Models\Mentor;
use App\Services\FileUploadProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class MentorController extends Controller
{



    protected function store(MentoJoin $request, FileUploadProfile $fileUploadProfile){

        $validated = $request->validated();

        $validated['profile_image'] = $request->hasFile('profile_image') ? $fileUploadProfile->upload($request->file('profile_image')) : "";

        $mentor = Mentor::create($validated);

        $token['token'] = JWTAuth::fromUser($mentor);

        return Response::success($token);
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
