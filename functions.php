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
