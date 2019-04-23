<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class VillageInfo extends Model
{
    //

    protected $table = "village_info";
    protected $primaryKey = "VILAGE_ID";

    public function mains(){

        $villages = DB::table('village_info')
            ->leftJoin('village_video', 'village_info.VILAGE_ID', '=', 'village_video.VILAGE_ID')
            ->select(
                'village_info.VILAGE_ID', 'VILAGE_SLGN', 'VILAGE_NM', 'THEMA_NM', 'ADDR1', 'ADDR2',
                'village_info.THUMB_URL_COURS1', 'village_info.THUMB_URL_COURS2', 'village_info.THUMB_URL_COURS3', 'village_info.THUMB_URL_COURS4',
                'village_video.CN', 'village_video.SJ', 'village_video.THUMB_URL_COURS1 as V_THUMB_URL_COURS1'
            )
            ->inRandomOrder()
            ->limit(12)
            ->get();

        return $villages;
    }


    public function villages(){

        return $this->hasOne('App\Models\VillageVideo', 'VILAGE_ID');
    }


}

// http://211.237.50.150:7080/openapi/b4f371498f96c269899f61303f99cd9a4e1a9bcc6693ffb906eb4d12fc141174/json/Grid_20141217000000000095_1/1/5
