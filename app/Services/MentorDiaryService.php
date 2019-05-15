<?php


namespace App\Services;
use App\Models\MentorDiary;

class MentorDiaryService implements DiaryFactory
{

    public function __construct()
    {
    }

    /**
     * @param $diaryData
     * @return MentorDiary
     */
    public function create($diaryData)
    {

//        if(!is_null($mentorData->file('profile_image')))
//        {
//            $profile_image = $this->fileUploadProfile->upload($mentorData->file('profile_image'));
//            $mentorData = $mentorData->all();
//            $mentorData['profile_image'] = $profile_image;
//        }

        $mentoDiary             = new MentorDiary();
        $mentoDiary->mentor_srl = $diaryData->mentor_srl;
        $mentoDiary->title      = $diaryData->title;
        $mentoDiary->image      = $diaryData->image;
        $mentoDiary->contents   = $diaryData->contents;
        $mentoDiary->save();

        return $mentoDiary;
    }
}