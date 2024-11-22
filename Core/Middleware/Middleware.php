<?php

namespace Core\Middleware;


class Middleware
{

    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];


    public static function resolve($key)
    {
        // Check if key exists (auth, guest)
        if (! $key) {
            return;
        }

        // Instantiate the Middleware class and call the handle method
        // Find the corresponding middleware class
        $middleware = static::MAP[$key] ?? false; // If no key, set middleware to false


        // if handle is null
        if (! $middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'");
            // Returns: Fatal error: Uncaught Exception: No matching middleware found for key 'foobar' in ...
        }

        (new $middleware)->handle();
    }
}
