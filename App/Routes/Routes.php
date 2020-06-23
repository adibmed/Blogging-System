<?php

$route->get('/home', 'postController');
$route->get('/post/add', 'postController::add');
$route->get('/post/edit', 'postController::edit');
$route->get('/about', 'aboutController');
