<?php

namespace App\Http\Controllers;

use App\Services\OpenApiService;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Http\Request;

class OpenApiController extends Controller
{
    /** @var HttpClient */
    private $httpClient;

    /** @var OpenApiService */
    private $openApiService;

    /**
     * OpenApiController constructor.
     * @param HttpClient $httpClient
     * @param OpenApiService $openApiService
     */
    public function __construct(HttpClient $httpClient, OpenApiService $openApiService)
    {
        $this->httpClient = $httpClient;
        $this->openApiService = $openApiService;
    }

    /**
     * @param Request $request
     * @return bool|string
     */
    protected function machines(Request $request)
    {
        // TODO : validate 필요.
        $data = $request->all();

        // TODO : 이부분 자체도 서비스에 올라 갈수 있는데 type 에 대한 명확한 요구사항이 필요합니다.
        // 그리고 보통 json 만 하도록 하세요.
        $url = $this->openApiService->getMachineUrl(
            $data['type'],
            $data['ctprvn'],
            $data['fchkind']
        );
        $response = $this->httpClient->get($url);

        return json_decode($response->getBody());
    }

    /**
     * @param Request $request
     * @return bool|string
     */
    protected function dictionary(Request $request)
    {
        // TODO : 위와 같이 변경합니다.
        $params = "CL_NM=".urlencode($request->CL_NM);

        $url = $this->api_call_url."/".$request->type."/".self::API_GRID_DICTIONARY."/1/100?".$params;

        return $this->callApiToJson($url);
    }

}
