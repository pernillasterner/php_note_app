<?php

namespace Session;


class Session
{

    public static function has($key)
    {
        return (bool) static::get($key);
    }


    public static function put($key, $value)
    {

        $_SESSION[$key] = $value;
    }


    public static function get($key, $default = null)
    {
        // if key exist return in, otherwise return the default
        return $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }
}
