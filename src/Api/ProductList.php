<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace YuppimApi\Api;

use \YuppimApi\Common\AbstractApi;

/**
 * Class ProductList
 * @package YuppimApi\Api
 */
class ProductList extends AbstractApi
{
    /**
     * @var string 
     */
    protected $endpoint = 'products';
    protected $page;
    protected $limit;

    /**
     * @param $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
    
    /**
     * @param $productId
     */
    public function get()
    {
        $params = [];
        if ($this->page) {
            $params['page'] = $this->page;
        }
        if ($this->limit) {
            $params['limit'] = $this->limit;
        }
        return $this->apiClient->send($this->endpoint, $params);
    }
}