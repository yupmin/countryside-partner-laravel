<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Mentee extends Model implements JWTSubject
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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [
            'user_type' => 'MENTOR',
            'id' => $this->mentee_srl,
            'profile_image' => $this->profile_image,
        ];
    }
}
