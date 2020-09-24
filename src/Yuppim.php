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
    protected $apiToken;
    /**
     * @var 
     */
    protected $apiClient;

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
     * @param $apiToken
     * @return $this
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
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
    protected function getApiClient()
    {
        if ($this->apiClient === null) {
            $this->apiClient = new ApiClient(
                $this->getBaseUrl(),
                $this->apiToken
            );
        }
        return $this->apiClient;
    }

    /**
     * @return Api\Product
     */
    public function product()
    {
        return new \YuppimApi\Api\Product($this->getApiClient());
    }

    /**
     * @return Api\Product
     */
    public function products()
    {
        return new \YuppimApi\Api\ProductList($this->getApiClient());
    }
}