<?php


namespace App\Services;
use App\Models\MentorDiary;

class MentorDiaryService implements DiaryInterface
{

    private $fileUploadService;
    private $mentorDiary;

    /**
     * MentorDiaryService constructor.
     * @param MentorDiary $mentorDiary
     * @param FileUploadService $fileUploadService
     */
    public function __construct(MentorDiary $mentorDiary, FileUploadService $fileUploadService)
    {
        $this->mentorDiary= $mentorDiary;
        $this->fileUploadService = $fileUploadService;
    }


    /**
     * @param $diaryData
     */
    public function create($diaryData)
    {

        $this->mentorDiary->mentor_srl  = $diaryData->id;
        $this->mentorDiary->title       = $diaryData->title;
        $this->mentorDiary->image       = $this->fileUploadService->contentsUpload($diaryData->image);
        $this->mentorDiary->contents    = $diaryData->contents;
        $this->mentorDiary->save();
    }

    /**
     * @param $diary_srl
     * @return MentorDiary|MentorDiary[]|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getDiary($diary_srl)
    {

        return $this->mentorDiary->with('mentor')->find($diary_srl);
    }

    /**
     * @return MentorDiary[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {

        return $this->mentorDiary->with('mentor')->orderBy('regdate', 'desc')->get();
    }

    /**
     * @param $mentor_srl
     * @return \Illuminate\Support\Collection
     */
    public function userDiary($mentor_srl)
    {
        // TODO: Implement userDiary() method.
        $mentorDiaries = $this->mentorDiary->orderBy('regdate', 'DESC')->paginate(3);
        $collection = collect($mentorDiaries);

        $diaries = $collection->map(function ($item, $key) {

            if($key === "data"){

                for($i = 0; $i < count($item); $i++)
                {
                    $item[$i]['contents'] = str_limit($item[$i]['contents'], $limit = 200, $end = '...');
                }
            }

            return $item;
        });

        return $diaries;
    }
}
