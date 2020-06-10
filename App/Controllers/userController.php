<?php

namespace App\Controllers;

use Core\classes\Controller;
use App\Models\User;

class userController extends Controller
{

    function index($id = '', $name = '')
    {
        var_dump(User::getAll());
    }
}
