<?php
namespace App\Controllers;

use Core\classes\Controller;

class homeController extends Controller
{ 
   
     function index($id = '', $name = '')
    {    
        $this->view('home', []);
        $this->view->render();
    }
}