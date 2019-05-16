<?php


namespace App\Services;
use App\Exceptions\MeteoException;
use App\Models\MentorDiary;

class DiaryService implements DiaryInterface
{

    private $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }



    public function create($diaryData)
    {

        if($diaryData->user_type === "MENTOR")
        {
            return $this->createMentorDiary($diaryData);

        } elseif ($diaryData->user_type === "MENTEE")
        {
            return $this->createMenteeDiary($diaryData);

        } else
        {
            throw new MeteoException(700);
        }

    }

    public function get(int $diary_srl)
    {
        // TODO: Implement get() method.
    }

    public function createMentorDiary($diaryData){

        $mentoDiary             = new MentorDiary();
        $mentoDiary->mentor_srl = $diaryData->id;
        $mentoDiary->title      = $diaryData->title;
        $mentoDiary->image      = $this->fileUploadService->contentsUpload($diaryData->image);
        $mentoDiary->contents   = $diaryData->contents;
        $mentoDiary->save();

        return $mentoDiary;
    }

    public function createMenteeDiary($diaryData){

        $menteeDiary             = new MentorDiary();
        $menteeDiary->mentor_srl = $diaryData->id;
        $menteeDiary->title      = $diaryData->title;
        $menteeDiary->image      = $this->fileUploadService->contentsUpload($diaryData->image);
        $menteeDiary->contents   = $diaryData->contents;
        $menteeDiary->save();

        return $menteeDiary;
    }
}