<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace YuppimApi\Api;

use \YuppimApi\Common\AbstractApi;

/**
 * Class Product
 * @package YuppimApi\Api
 */
class Product extends AbstractApi
{
    /**
     * @var string 
     */
    protected $endpoint = 'product';

    /**
     * @param $productId
     */
    public function get($productId)
    {
        return $this->apiClient->send($this->endpoint . '/'. $productId);
    }
}