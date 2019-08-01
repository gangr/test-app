<?php

namespace Services;

use Core\Request;

class RouterService
{
    /**
     * @var string
     */
    public $route;

    /**
     * @var string
     */
    public $method;

    /**
     * @var
     */
    public $queryString;

    /**
     * @var array
     */
    public $postParams = [];

    /**
     * @var array
     */
    public $methodsHttp = ['get', 'post'];

    /**
     * @var Request
     */
    public $request;

    /**
     * RouterService constructor.
     */
    public function __construct()
    {
        $this->route = '/' . rtrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->method = in_array($method, $this->methodsHttp) ? $method : 'get';
        $this->queryString = $_SERVER['QUERY_STRING'];

        // set post params if any present and clear $_POST
        if(!empty($_POST)) {
            foreach ($_POST as $key => $val) {
                $this->postParams[$key] = $val;
                unset($_POST[$key]);
            }
        }

        $queryParams = !empty($_GET) ? $_GET : [];

        $this->request = new Request(
            $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
            $this->route,
            $this->method = in_array($method, $this->methodsHttp) ? $method : 'get',
            $queryParams,
            $this->postParams,
            []
        );
    }

    public function followRoute()
    {
        global $routes;

        $controller = '';
        $action = '';
        $result = 200;

        $routeArray = explode('/', ltrim($this->route, '/'));

        if($routeArray[0] == '') {
            $routeArray[0] = '/';
        } else {
            array_unshift($routeArray, '/');
        }

        if(isset($routeArray[4])) {
            $result = 404;
        }

        if($result !== 404) {
            $route = (count($routeArray) > 1) ? $routeArray[1] . (isset($routeArray[2]) ? '/' . $routeArray[2] : '') : '/';
            $param = isset($routeArray[3]) ? $routeArray[3] : null;

            if(isset($routes[$route])) {
                $controller = isset($routes[$route]['controller']) ? 'Controllers\\' . $routes[$route]['controller'] . 'Controller' : null;
                $action = isset($routes[$route]['action']) ? $routes[$route]['action'] . 'Action' : null;

                $this->request->setAssets([
                    'styles' => isset($routes[$route]['styles']) ? $routes[$route]['styles'] : [],
                    'scripts' => isset($routes[$route]['scripts']) ? $routes[$route]['scripts'] : [],
                ]);
            }

            if(class_exists($controller)) {
                $controllerInstance = new $controller($this->request);

                if (method_exists($controllerInstance, $action)) {
                    $controllerInstance->$action($param);
                    exit;
                }
            }
        }

        // 404 Page not found
        echo '<h1>404 Not found</h1>';
        exit;
    }
}