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


        $villages = $this->villageInfo->mains();

        return response()->json($villages);

    }
}
