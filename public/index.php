<?php

use Core\classes\Request;
use Core\classes\Router;


require_once '../App/Config/files.php';
require_once '../App/Config/database.php';
require_once ROOT . 'bootstrap.php';
require_once '../App//install.php';

$request = new Request;
$router = new Router($request);

try {
    $router->loadRoutes('../App/Routes/Routes.php')->match();
    $router->dispatch();
    
} catch (Exception $e) {
    echo $e->getMessage();
}

/*    highlight_string("<?php\n " . var_export($router, true) . "?>");  */
