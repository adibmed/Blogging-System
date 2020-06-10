<?php

spl_autoload_register(function ($className) {

    // echo "<p style=\"color: green;\"> __DIR__: <b>" . __DIR__."</b></p>";
    // echo "<p style=\"color: red;\">dirname(__DIR__): <b>" . dirname(__DIR__) ."</b></p>";
    // echo "<p style=\"color: blue;\">Class Name: <b>" . $className."</b></p>";

    $classPath  = dirname(__DIR__) .  '/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($classPath)) include $classPath;
    // else echo '<b><p style=\'color: red;\'>File: ' . $classPath. ' does not exitst!</p></b>';
});
