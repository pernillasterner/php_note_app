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
