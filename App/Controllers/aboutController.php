<?php

use Core\classes\Controller;
use Core\classes\View;

class aboutController extends Controller
{

    public function __construct()
    {
        echo 'Hi there';
    }

    public function index()
    {
        $this->view = new View('about', []);
        $this->view->render();
    }
}
