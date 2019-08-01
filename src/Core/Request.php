<?php

namespace Core;

/**
 * Class Request
 * @package Core
 */
class Request
{
    /**
     * @var String
     */
    public $path;

    /**
     * @var String
     */
    public $route;

    /**
     * @var String
     */
    public $method;

    /**
     * @var array
     */
    public $queryParams;

    /**
     * @var array
     */
    public $postParams;

    /**
     * @var bool
     */
    public $isAjaxRequest;

    /**
     * @var array
     */
    public $assets;

    /**
     * Request constructor.
     * @param String $path
     * @param String $route
     * @param String $method
     * @param array $queryParams
     * @param array $postParams
     * @param array $assets
     */
    public function __construct(
        String $path = '',
        String $route = '/',
        String $method = 'get',
        Array $queryParams = [],
        Array $postParams = [],
        Array $assets = []
    )
    {
        $this->path = $path;
        $this->route = $route;
        $this->method = $method;
        $this->queryParams = $queryParams;
        $this->postParams = $postParams;
        $this->assets = $assets;
        $this->isAjaxRequest = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    /**
     * @param array $assets
     */
    public function setAssets(Array $assets)
    {
        $this->assets = $assets;
    }
}
