<?php
/**
 * Created by PhpStorm.
 * User: bagjayun
 * Date: 2019. 4. 23.
 * Time: PM 4:37
 */

namespace App\Traits;


trait OpenApiTrait
{


    private $api_key = null;
    private $api_endpoint = "http://211.237.50.150:7080/openapi";
    private $api_call_url = null;

    public function __construct()
    {
        $this->api_key = env('OPEN_API_KEY');
        $this->api_call_url = $this->api_endpoint."/".$this->api_key;
    }

    public function callApiToJson(string $url)
    {
         return $this->getCurl($url);
    }

    private function getCurl(string $url){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }





//    public function callApiToJson(string $url)
//    {
//
//        $url = $this->api_call_url."/".$request->type."/".self::API_GRID_MACHINES."/1/100?YEAR=2014&";//.$param, $type
//
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, FALSE);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        if($type === "xml")
//        {
//            $xml = simplexml_load_string($response);
//
//            $collection = collect( $this->xmlToArray($xml) );
//
//        }else{
//
//            $collection = $response;
//        }
//
//        return $collection;
//    }







    public function xmlToArray ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )

            $out[$index] = ( is_object ( $node ) ) ? $this->xmlToArray ( $node ) : $node;

        return $out;
    }


}









