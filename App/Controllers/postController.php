<?php
namespace App\Controllers;

use App\Models\Post;
use Core\classes\Controller;

class postController extends Controller
{
    // View all existing posts
    public function index()
    {
        $this->view('post' .  DIRECTORY_SEPARATOR . 'index', Post::find(0));
        $this->view->render();
    }

    // Add new post
    public function add()
    {
        $this->view('post' . DIRECTORY_SEPARATOR . 'add', []);
        $this->ivew->render();
    }
}
