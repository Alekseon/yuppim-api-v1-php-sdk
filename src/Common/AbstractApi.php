<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace YuppimApi\Common;

/**
 * Class AbstractApi
 * @package YuppimApi\Common
 */
class AbstractApi
{
    /**
     * @var ApiClient 
     */
    protected $apiClient;
    
    /**
     * AbstractApi constructor.
     * @param ApiClient $apiClient
     */
    public function __construct(
        ApiClient $apiClient
    )
    {
        $this->apiClient = $apiClient;
    }
}