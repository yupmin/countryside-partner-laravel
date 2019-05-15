<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMentorRequest;
use App\Models\Mentor;


use App\Services\MentorService;
use Illuminate\Http\Request;


class MentorController extends Controller
{



    protected function store(StoreMentorRequest $request, MentorService $mentorService){

        $mentor = $mentorService->create($request);

        return response()->success($mentor);
    }


    protected function index($mentor){

        $mentor = Mentor::findOrFail($mentor);
        return response()->success($mentor);
    }

    protected function lists(){

        $mentors = Mentor::all();
        return response()->success($mentors);
    }


}
