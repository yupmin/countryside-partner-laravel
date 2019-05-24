<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMentorRequest;
use App\Models\Mentor;

use App\Services\MentorInterface;


class MentorController extends Controller
{

    private $mentor;

    public function __construct(MentorInterface $mentor)
    {
        $this->mentor = $mentor;
    }

    protected function store(StoreMentorRequest $request){

        $mentorInfo = $this->mentor->create($request);

        return response()->success($mentorInfo);
    }


    protected function index(int $mentor_srl){

        if(request('is_diary') === "true")
        {
            $mentorInfo = $this->mentor->getMentor($mentor_srl);

        } else{

            $mentorInfo = Mentor::find($mentor_srl);
        }

        return response()->success($mentorInfo);
    }

    protected function lists(){

        $mentors = Mentor::all();
        return response()->success($mentors);
    }


}
