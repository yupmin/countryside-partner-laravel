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

        $mentor = $this->mentor->create($request);

        return response()->success($mentor);
    }


    protected function index($mentor_srl){

        if(request('is_diary') === "true")
        {
            $mentor = $this->mentor->getMentor($mentor_srl);

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
