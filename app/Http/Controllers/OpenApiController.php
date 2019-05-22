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

        $params = "&CTPRVN=".urlencode($request->CTPRVN);

        !empty($request->FCH_KND) ? $params .= "&FCH_KND=".urlencode($request->FCH_KND) : "" ;

        $url = $this->api_call_url."/".$request->type."/".self::API_GRID_MACHINES."/1/100?YEAR=2014".$params;

//        echo $url;exit;

        return $this->callApiToJson($url);
    }

    protected function dictionary(Request $request){

        return $this->callApi(self::API_GRID_DICTIONARY, $request->type, $request->param);
    }

}
