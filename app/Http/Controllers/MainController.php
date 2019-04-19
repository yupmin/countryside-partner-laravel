<?php

namespace App\Http\Controllers;

use App\Models\VillageInfo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    private $villageInfo = null;

    public function __construct(VillageInfo $villageInfo)
    {
        $this->villageInfo = $villageInfo;
    }

    protected function index(){

        $villages = $this->villageInfo
                        ->select(
                            'VILAGE_ID', 'VILAGE_SLGN', 'VILAGE_NM', 'THEMA_NM',
                            'ADDR1', 'ADDR2', 'THUMB_URL_COURS1', 'THUMB_URL_COURS2', 'THUMB_URL_COURS3', 'THUMB_URL_COURS4'
                        )
                        ->inRandomOrder()
                        ->limit(25)
                        ->get();

        return response()->json($villages);

    }
}
