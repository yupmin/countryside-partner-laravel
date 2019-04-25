<?php
/**
 * Created by PhpStorm.
 * User: bagjayun
 * Date: 2019. 4. 23.
 * Time: PM 4:37
 */

namespace App\Traits;


trait VillageTrait
{

    public function xmlToArray ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )

            $out[$index] = ( is_object ( $node ) ) ? $this->xmlToArray ( $node ) : $node;

        return $out;
    }

    /**
     * @param string $apiType
     * @param string $village_id
     * @return mixed
     */
    public function getOpenApiVillage(string $apiType, string $village_id){


//        return $this->curl($apiType, $village_id);
        return $this->curlTest();

    }

    public function curlTest(){


        $api_end_point = "http://211.237.50.150:7080/openapi/b4f371498f96c269899f61303f99cd9a4e1a9bcc6693ffb906eb4d12fc141174/xml/Grid_20141217000000000100_1/1/5";
        $url = $api_end_point;

        $ch = curl_init();
        $queryParams = '?' . ('VILAGE_NM') . '=' . urlencode("흥부마을");

        curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        curl_close($ch);

        dd($response);
        $xml = simplexml_load_string($response);

        dd($xml);

        $collection = collect( $this->xmlToArray($xml) );

        return $collection;
    }


    public function curl(string $apiType, string $village_id){


        $api_end_point = "http://openapi.ekr.or.kr/openapi/service/rest/StayngService";
        $url = $api_end_point."/".$apiType;

        $ch = curl_init();
        $queryParams = '?' . urlencode('ServiceKey') . '='.env('VILLAGE_HOUSE_API_KEY', 'API_KEY');
        $queryParams .= '&' . urlencode('vilageId') . '=' . urlencode($village_id);

        curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        curl_close($ch);

        $xml = simplexml_load_string($response);

        $collection = collect( $this->xmlToArray($xml) );

        return $this->resultSet($collection);
    }


    public function resultSet($collection){

        $village = $collection->map(function ($item, $key){

            if($key === "body") {

                if (!empty($item['items']['item'])) {

                    $item['items']['item']['pcHhsn'] = number_format($item['items']['item']['pcHhsn']);
                    $item['items']['item']['pcSlkssn'] = number_format($item['items']['item']['pcSlkssn']);
                }
            }

            return $item;

        })->except(['header']);

        return $village;
    }


}









