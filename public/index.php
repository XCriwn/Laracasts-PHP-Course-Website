<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

spl_autoload_register(function($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
   require base_path("{$class}.php");
});
//require BASE_PATH . "database/Response.php";
require BASE_PATH . "core/functions.php";
require base_path('bootstrap.php');

$router = new \Core\Router();


$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

//$method = isset($_POST['_method']) ? $_POST['method'] : $_SERVER['REQUEST_METHOD'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$routes = require base_path('core/routes.php');


//routeToController($uri,$routes);
try{
    $router->route($uri, $method);
}catch(\core\ValidationException $exception){
    \core\Session::flash('errors', $exception->getErrors());
    \core\Session::flash('old', $exception->getOld());

    return redirect($router->previousUrl());
}


\core\Session::unflash();



