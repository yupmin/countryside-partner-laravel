<?php

namespace App\Services;

use League\Uri;

class OpenApiService
{
    const API_GRID_MACHINES = "Grid_20141119000000000080_1"; //  농기계 현황
    const API_GRID_DICTIONARY = "Grid_20151230000000000339_1"; // 농업용어

    /** @var ?string */
    private $api_key = null;

    /** @var string  */
    private $api_endpoint = 'http://211.237.50.150:7080';

    /** @var ?string */
    private $api_call_url = null;

    public function __construct()
    {
        $this->api_key = config('open_api.key');
        $this->api_call_url = $this->api_endpoint."/".$this->api_key;
    }

    public function getMachineUrl(string $type, string $ctprvn, string $fchKind) {
        $queryParams = [
            'YEAR' => 2014,
            'CTPRVN' => $ctprvn,
        ];
        if (!empty($fchKind)) {
            $queryParams['FCH_KND'] = $fchKind;
        }

        return (string)Uri\Uri::createFromString($this->api_call_url)
            ->withPath('openapi/'.$type.'/'.static::API_GRID_MACHINES.'/1/100')
            ->withQuery(Uri\build_query($queryParams));
    }
}
