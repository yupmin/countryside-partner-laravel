<?php

namespace App\Http\Controllers;

use App\Traits\VillageTrait;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    //

    use VillageTrait;

    const VILAGE_STAYNG = "getExprnVilageStayng"; // 체험마을 민박 조회
    const VILAGE_EXPRNVILAGEGRPSTAYNG = "getExprnVilageGrpStayng"; // 체험마을 단체숙박 조회
//    const VILAGE_GETEXPRNVILAGECFRSTAYNG = "getExprnVilageCfrStayng"; // 체험마을 주변숙박 조회

    const APPLE = "apple";

    protected function village(string $village_id){


        $result = $this->getOpenApiVillage(self::VILAGE_STAYNG, $village_id);


        return $result;
    }

}
