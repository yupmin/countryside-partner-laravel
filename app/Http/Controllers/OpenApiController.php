<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\OpenApiTrait;
class OpenApiController extends Controller
{
    //

    use OpenApiTrait;

    const API_GRID_DICTIONARY = "Grid_20151230000000000339_1"; // 농업용어
    const API_GRID_MACHINES = "Grid_20141119000000000080_1"; //  농기계 현황


    protected function machines(Request $request){

        empty($request->param) ? $request->param = "" : $request->param;
        return $this->callApi(self::API_GRID_MACHINES, $request->type, $request->param);
    }

    protected function dictionary(Request $request){

        return $this->callApi(self::API_GRID_DICTIONARY, $request->type, $request->param);
    }



    protected function index(Request $request){

        return $this->callApi($request->call, $request->type);
    }
}
