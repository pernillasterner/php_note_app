<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        // From routes.php $router->get('/', 'controllers/index.php');
        // $this->routes[] = [
        //     'uri' => $uri, // '/'
        //     'controller' => $controller, // 'controllers/index.php'
        //     'method' => $method
        // ];

        // Compact creates new associative array where the keys are the name of the given variable ($method, $uri, $controller)
        $this->routes[] = compact('method', 'uri', 'controller');
    }


    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
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
