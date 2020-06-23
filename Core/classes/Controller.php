<?php
namespace Core\classes;


use Core\classes\View;

class Controller
{
    protected $model;
    protected $view;

    public  function view($viewName, $data = [])
    {
        $this->view = new View($viewName, $data);
        return $this->view;
    }
}
