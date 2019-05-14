<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenteeJoin;
use App\Models\Mentee;
use App\Services\FileUploadProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use JWTAuth;

class MenteeController extends Controller
{
    protected function store(MenteeJoin $request, FileUploadProfile $fileUploadProfile){

        $validated = $request->validated();

        $validated['profile_image'] = $request->hasFile('profile_image') ? $fileUploadProfile->upload($request->file('profile_image')) : "";

        $mentee = Mentee::create($validated);

        $collection = collect($mentee)->put('token', JWTAuth::fromUser($mentee));

        return Response::success($collection);
    }


    protected function index($mentee){

        $mentee = Mentee::findOrFail($mentee);
        return Response::success($mentee);
    }

    protected function lists(){

        $mentees = Mentee::all();
        return Response::success($mentees);
    }
}