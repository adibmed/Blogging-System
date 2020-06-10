<?php
namespace App\Controllers;

use App\Models\Post;
use Core\classes\Controller;

class postController extends Controller
{
    public function index()
    {
        $this->view('post' .  DIRECTORY_SEPARATOR . 'index', Post::find(0));
        $this->view->render();
    }
}
