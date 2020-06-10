<?php

namespace  Core\classes;

class Request
{
    protected $url;
    protected $method;
    protected $params;

    public function __construct()
    {
        $this->url = parse_url(trim($_SERVER['REQUEST_URI'], '/'), PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = array_slice(explode('/', trim($_SERVER['REQUEST_URI'], '/')), 0) ?: null;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParams()
    {
        return $this->params;
    }
}

?>