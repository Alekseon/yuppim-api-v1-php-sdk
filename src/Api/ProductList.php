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
    protected $filters = [];

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
     * @param $field
     * @param $operator
     * @param $value
     */
    public function addFilter($field, $operator, $value)
    {
        $this->filters[$field][] = [
            'operator' => $operator,
            'value' => $value,
        ];
        return $this;
    }

    /**
     * @return $this
     */
    public function resetFilters()
    {
        $this->filters = [];
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

        if (!empty($this->filters)) {
            $params['filters'] = json_encode($this->filters);
        }

        return $this->apiClient->send($this->endpoint, $params);
    }
}
