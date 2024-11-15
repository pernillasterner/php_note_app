<?php

// parse_url breaks down a URL into its components
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Declaration of routes. Route listener our endpoint
$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/contact' => 'controllers/contact.php',
];


// Function to handle routing
function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

// Function that will abort when given a status code
function abort($code = 404)
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}


routeToController($uri, $routes);
