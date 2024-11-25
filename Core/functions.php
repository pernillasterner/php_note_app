<?php

/**
 * Utility functions for the application
 * 
 * Provides helper functions for debugging, URL handling,
 * authorization, path management, and rendering views
 * 
 */

// Importing class Response
use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "<pre>";

    die();
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

// Function that will inform what page is active
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

// Function that makes it possible to overwrite status code
function authorize($condition, $status = Response::FORBIDDEN)
{
    // Status code 403 - Forbidden
    if (! $condition) {
        abort($status);
    }
}

// Function for declaring a path that is relative to the root of the project
function base_path($path)
{
    return BASE_PATH . $path;
}

// Function for rendering views
function view($path, $attributes = [])
{
    // Import variables into the current symbol table from an array
    extract($attributes);
    require base_path('views/' . $path); // /views/index.view.php
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}
