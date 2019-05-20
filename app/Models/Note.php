<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    const CREATED_AT = 'regdate';
    const UPDATED_AT = null;

    protected $table = "cp_notes";
    protected $primaryKey = "note_srl";
    protected $hidden = [];
    protected $guarded = []; // name을 제외한 모든 속성들은 대량 할당이 가능하다.
//    protected $fillable = ['name']; // name, 를 대량 할당이 가능하다. guarded 혹은 fillable 둘 중에 하나만 써야 함.
}
