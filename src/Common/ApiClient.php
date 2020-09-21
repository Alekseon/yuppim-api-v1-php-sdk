<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace YuppimApi\Common;

/**
 * Class RestClient
 * @package YuppimApi\Common
 */
class ApiClient
{
    /**
     * @var
     */
    protected $apiToken;
    /**
     * @var
     */
    protected $baseUrl;

    /**
     * RestClient constructor.
     * @param $baseUrl
     * @param $apiToken
     */
    public function __construct(
        $baseUrl,
        $apiToken
    )
    {
        $this->baseUrl = $baseUrl;
        $this->apiToken = $apiToken;
    }

    /**
     * @param $endpointUri
     */
    public function send($endpointUri, $params = [])
    {
        $curl = curl_init();

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->apiToken
        ];

        if (!empty($params)) {
            $endpointUri = $endpointUri . '?' . http_build_query($params);
        }

        curl_setopt($curl, CURLOPT_URL, $this->baseUrl . 'api/' . $endpointUri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return $this->handleResponse($httpCode, $response);
    }

    /**
     * @param $httpCode
     * @param $response
     * @return array|mixed
     */
    protected function handleResponse($httpCode, $response)
    {
        switch ($httpCode) {
            case 200:
                $response = json_decode($response, true);
                break;
            case 404:
                $response = ['error' => 'Resource not found'];
                break;
            case 302:
                $response = ['error' => 'You are not authorized to access this API'];
                break;
            default:
                $response = ['error' => 'Http error code: ' . $httpCode];
        }
        $response['status_code'] = $httpCode;
        return $response;
    }
}
