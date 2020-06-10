<?php

namespace Core\classes;

use Core\classes\Request;
use Core\classes\View;
use Core\Exceptions\Exception;

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
        $this->controller = 'homeController';
        $this->action = 'index';
    }

    function match()
    {
        if (!array_key_exists($this->request->getUrl(), $this->routes[$this->request->getMethod()])) {
            $view_404 = new View('404', []);
            $view_404->render();
            // new Exception();
        }
        else
        $this->matched_route = $this->routes[$this->request->getMethod()][$this->request->getUrl()];
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
            

            //$this->action = explode('/', $this->request->getUrl()[1]);
            $this->params = $this->request->getParams();

            $this->controller = 'App\Controllers\\' . $collable;         
            if (class_exists($this->controller)) {

               $controller_obj =  new $this->controller;

                if (method_exists($this->controller, $this->action)) {
                    $a = $this->action;
                    $controller_obj->$a();
                    // $this->test($this->action);
                    //call_user_func_array([$this->controller, $this->action], []);
                } 
                // else echo 'Method not exist';
            } 
            // else echo 'class not found';
        }
    }


    public  function test($test)
    {
        highlight_string("<?php\n " . var_export($test, true) . "?>");
    }
}
