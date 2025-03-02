<?php

use Core\Session;
use Core\ValidationException;


//  __DIR__ = Current directory
// BASE_PATH = Root of the project
const BASE_PATH = __DIR__ . '/../';

// Automatically loads class files by converting the class name into a file path and requiring it.
require BASE_PATH . '/vendor/autoload.php';

session_start();

// ...php_note_app/public/../
// var_dump(BASE_PATH);

// Loading functions
require BASE_PATH . 'Core/functions.php';

require base_path('bootstrap.php');


// require base_path('Core/router.php');
$router = new \Core\Router();
$routes = require base_path('routes.php');

// parse_url breaks down a URL into its components
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// If _method is set then override POST with DELETE method
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {

    // routeToController($uri, $routes);
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    // if auth or validation fails, return to login form and display error message
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}


Session::unflash();
