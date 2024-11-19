<?php
// Reusable functions.

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "<pre>";

    die();
}

// Function that will inform what page is active
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

// Make it possible to overwrite status code
function authorize($condition, $status = Response::FORBIDDEN)
{
    // Status code 403 - Forbidden
    if (! $condition) {
        abort($status);
    }
}


// Helper function for declaring a path that is relative to the root of the project
function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    // Import variables into the current symbol table from an array
    extract($attributes);
    require base_path('views/' . $path); // /views/index.view.php
}
