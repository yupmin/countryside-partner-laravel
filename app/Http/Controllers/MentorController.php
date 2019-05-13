<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentoJoin;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Traits\UserTrait;
use App\Services\MentorService;

class MentorController extends Controller
{





    protected function store(MentoJoin $request, MentorService $mentorService){

        $validated = $request->validated();

        $token = $mentorService->mentorCreateAfterResponseToken($validated, $request);

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
