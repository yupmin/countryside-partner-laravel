<?php


namespace App\Services;
use App\Models\MentorDiary;

class MentorDiaryService implements DiaryInterface
{

    private $fileUploadService;
    private $mentorDiary;

    public function __construct(MentorDiary $mentorDiary, FileUploadService $fileUploadService)
    {
        $this->mentorDiary= $mentorDiary;
        $this->fileUploadService = $fileUploadService;
    }


    public function create($diaryData)
    {

        $this->mentorDiary->mentor_srl  = $diaryData->id;
        $this->mentorDiary->title       = $diaryData->title;
        $this->mentorDiary->image       = $this->fileUploadService->contentsUpload($diaryData->image);
        $this->mentorDiary->contents    = $diaryData->contents;
        $this->mentorDiary->save();
    }

    public function getDiary($diary_srl)
    {

        return $this->mentorDiary->with('mentor')->find($diary_srl);
    }

    public function all()
    {

        return $this->mentorDiary->with('mentor')->orderBy('regdate', 'desc')->get();
    }

    public function userDiary($mentor_srl)
    {
        // TODO: Implement userDiary() method.
        return $this->mentorDiary->orderBy('regdate', 'DESC')->paginate(15);
    }
}