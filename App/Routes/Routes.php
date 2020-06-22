<?php

$route->get('/home', 'postController');
$route->get('/post/add', 'postController::add');
$route->get('/post/{id}', 'postController::show');

$route->get('/about', 'aboutController');
