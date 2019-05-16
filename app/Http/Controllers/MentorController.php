<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMentorRequest;
use App\Models\Mentor;


use App\Services\MentorService;
use Illuminate\Http\Request;


class MentorController extends Controller
{

    private $mentorService;

    public function __construct(MentorService $mentorService)
    {
        $this->mentorService = $mentorService;
    }

    protected function store(StoreMentorRequest $request){

        $mentor = $this->mentorService->create($request);

        return response()->success($mentor);
    }


    protected function index($mentor_srl){

        if(request('is_diary') === "true")
        {
            $mentor = $this->mentorService->getMentor($mentor_srl);

        } else{

            $mentor = Mentor::find($mentor_srl);
        }

        return response()->success($mentor);
    }

    protected function lists(){

        $mentors = Mentor::all();
        return response()->success($mentors);
    }


}
