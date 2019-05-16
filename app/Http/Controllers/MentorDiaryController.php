<?php


namespace App\Http\Controllers;


use App\Http\Requests\StoreMentorDiaryRequest;
use App\Services\DiaryInterface;

class MentorDiaryController
{

    protected $diary;

    public function __construct(DiaryInterface $diary)
    {
        $this->diary = $diary;
    }

    public function store(StoreMentorDiaryRequest $request)
    {

        $this->diary->create($request);

        return response()->success();
    }

    public function show($diary_id)
    {
        $contents = $this->diary->get($diary_id);

        return response()->success($contents);
    }


    public function index()
    {
        $contents = $this->diary->all();

        return response()->success($contents);
    }
}