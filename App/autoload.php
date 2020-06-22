<?php

spl_autoload_register(function ($className) {

    $classPath  = dirname(__DIR__) .  '/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($classPath)) include $classPath;
});
