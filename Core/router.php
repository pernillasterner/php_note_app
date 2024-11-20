<?php

namespace Core;

class Router
{
    protected $routes = [];


    public function get($uri, $controller)
    {
        // From routes.php $router->get('/', 'controllers/index.php');
        $this->routes[] = [
            'uri' => $uri, // '/'
            'controller' => $controller, // 'controllers/index.php'
            'method' => 'GET'
        ];
    }

    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST'
        ];
    }

    public function delete($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE'
        ];
    }

    public function patch($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH'
        ];
    }

    public function put($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT'
        ];
    }

    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    // Function that will abort when given a status code
    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");
        die();
    }
}






// Function to handle routing
function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}
