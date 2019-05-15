<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenteeRequest;
use App\Models\Mentee;
use App\Services\MenteeService;
use Illuminate\Http\Request;
use JWTAuth;

class MenteeController extends Controller
{
    protected function store(StoreMenteeRequest $request, MenteeService $menteeService){

        $mentor = $menteeService->create($request);

        return response()->success($mentor);

    }


    protected function index($mentee){

        $mentee = Mentee::findOrFail($mentee);
        return response()->success($mentee);
    }

    protected function lists(){

        $mentees = Mentee::all();
        return response()->success($mentees);
    }
}