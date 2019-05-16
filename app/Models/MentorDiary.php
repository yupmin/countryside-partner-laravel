<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorDiary extends Model
{
    const CREATED_AT = 'regdate';
    const UPDATED_AT = null;

    protected $table = "cp_mentors_diary";
    protected $primaryKey = "diary_srl";
    protected $guarded = []; // name을 제외한 모든 속성들은 대량 할당이 가능하다.
//    protected $fillable = ['name']; // name, 를 대량 할당이 가능하다. guarded 혹은 fillable 둘 중에 하나만 써야 함.

    protected $hidden = [];



    public function mentor(){

        return $this->belongsTo(Mentor::class, 'mentor_srl');
    }

}
