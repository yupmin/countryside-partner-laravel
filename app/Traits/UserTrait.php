<?php


namespace App\Traits;

use App\Models\Mentor;
use JWTAuth;
use JWTFactory;

trait UserTrait
{

//    public $token = null;

    public function makeToken($mentor){

        return JWTAuth::fromUser($mentor);
    }

}