<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        // From routes.php $router->get('/', 'controllers/index.php');
        $this->routes[] = [
            'uri' => $uri, // '/'
            'controller' => $controller, // 'controllers/index.php'
            'method' => $method,
            'middleware' => null
        ];

        // Compact creates new associative array where the keys are the name of the given variable ($method, $uri, $controller)
        // $this->routes[] = compact('method', 'uri', 'controller');

        return $this;
    }


    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        // Apply middleware ex 'guest' to the router 
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    // when we try to match a route, does the uri and method match up? If, so apply middleware
    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            // dd($this->routes);
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                // apply the middleware
                if ($route['middleware'] === 'guest') {
                    if ($_SESSION['user'] ?? false) {
                        // redirect users that are not signed in
                        header('location: /');
                        exit();
                    }
                }

                if ($route['middleware'] === 'auth') {
                    if (! $_SESSION['user'] ?? false) {
                        // redirect users that are not signed in
                        header('location: /');
                        exit();
                    }
                }

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
