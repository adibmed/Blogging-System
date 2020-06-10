<?php

$route->get('/home', 'homeController');

$route->get('/users', 'userController');

$route->get('/home', 'postController');


$route->get('/post/add', 'postController');