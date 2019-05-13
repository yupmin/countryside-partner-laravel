<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Mentee extends Model
{
    const CREATED_AT = 'regdate';
    const UPDATED_AT = null;

    protected $table = "cp_mentees";
    protected $primaryKey = "mentee_srl";
    protected $guarded = []; // 입력된 배열을 제외한 모든 속성들은 대량 할당이 가능하다.
//    protected $fillable = ['name']; // name 를 대량 할당이 가능하다.
//  guarded 혹은 fillable 둘 중에 하나만 써야 함.

    protected $hidden = ['password', 'phone'];


    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);
    }

    public function setPhoneAttribute($value){

        $this->attributes['phone'] = encrypt($value);
    }
}