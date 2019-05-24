<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenteeRequest;
use App\Models\Mentee;
use App\Services\MenteeInterface;
use App\Services\MenteeService;
use Illuminate\Http\Request;
use JWTAuth;

class MenteeController extends Controller
{

    private $mentee;

    public function __construct(MenteeInterface $mentee)
    {
        $this->mentee = $mentee;
    }


    /**
     * @param StoreMenteeRequest $request
     * @return mixed
     */
    protected function store(StoreMenteeRequest $request){

        $menteeInfo = $this->mentee->create($request);

        return response()->success($menteeInfo);

    }


    /**
     * @return mixed
     */
    protected function lists(){

        $mentees = Mentee::all();
        return response()->success($mentees);
    }
}
