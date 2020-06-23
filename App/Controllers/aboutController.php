<?php

namespace App\Controllers;

use Core\classes\Controller;
use Core\classes\View;

class aboutController extends Controller
{
    public function index()
    {
        $this->view = new View('about', []);
        $this->view->render();
    }
}
