<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace YuppimApi;

use YuppimApi\Common\ApiClient;
use YuppimApi\Common\RestClient;

/**
 * Class Yuppim
 * @package YuppimApi
 */
class Yuppim
{
    /**
     * @var
     */
    protected $apiKey;
    /**
     * @var 
     */
    protected $restClient;

    /**
     * Yuppim constructor.
     * @param null $apiToken
     */
    public function __construct(
        $apiToken = null
    )
    {
        $this->apiToken = $apiToken;
    }

    /**
     * @param $apiKey
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    protected function getBaseUrl()
    {
        return Common\ApiConstants::BASE_URL;
    }

    /**
     * @return ApiClient
     */
    protected function getRestClient()
    {
        if ($this->restClient === null) {
            $this->restClient = new ApiClient(
                $this->getBaseUrl(),
                $this->apiKey
            );
        }
        return $this->restClient;
    }

    /**
     * @return Api\Product
     */
    public function product()
    {
        return new \YuppimApi\Api\Product($this->getRestClient());
    }

    /**
     * @return Api\Product
     */
    public function products()
    {
        return new \YuppimApi\Api\ProductList($this->getRestClient());
    }
}