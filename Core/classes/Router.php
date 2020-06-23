<?php

namespace Core\classes;

use Core\classes\Request;
use Core\classes\View;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];
    protected $request;
    private $controller;
    private $action;
    private $params = [];

    protected $matched_route;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->controller = 'postController';
        $this->action = 'index';
    }

    function match()
    {
        if (!array_key_exists($this->request->getUrl(), $this->routes[$this->request->getMethod()])) {
            $view_404 = new View('404', []);
            $view_404->render();
        } else $this->matched_route = $this->routes[$this->request->getMethod()][$this->request->getUrl()];

        // var_dump($this->matched_route);
        // foreach($this->routes[$this->request->getMethod()] as $route) {
        //     $pattern = '';
        //     $matches = array();
        // }
    }

    public function get($path, $handler)
    {
        $path = trim($path, '/') ?: '/';
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler)
    {
        $path = trim($path, '/') ?: '/';
        $this->routes['POST'][$path] = $handler;
    }

    public function loadRoutes($routesFile)
    {
        $route = $this;
        require $routesFile;
        return $route;
    }

    public function dispatch()
    {
        $collable = $this->matched_route;
        if (is_callable($this->matched_route)) {
            return $collable();
        } else {

            if (strpos($collable, '::')) {
                $this->action =  substr($collable, strpos($collable, '::') + 2, strlen($collable));
                $this->controller =  substr($collable, 0, strpos($collable, '::'));
            }
            $this->params = $this->request->getParams();

            $this->controller = 'App\Controllers\\' . $this->controller;

            if (class_exists($this->controller)) {

                $controller_obj =  new $this->controller;

                if (method_exists($controller_obj, $this->action)) {
                    call_user_func_array([$controller_obj, $this->action], ['params' => $this->getParams()]);
                } else echo 'Method not exist</br>';
            } else echo 'class not found</br>';
        }
    }

    private function getParams()
    {
        //var_dump($this->request->getParams());
        return $this->request->getParams();
    }

    public function printBig($test)
    {
        echo '<h1>';
        var_dump($test);
        echo '</h1>';
    }
}
