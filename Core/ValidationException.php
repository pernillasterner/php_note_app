<?php


namespace Core;

// ValidationException is an Exception. It inherits behaviors from the Exception class.
// Child and Parent
class ValidationException extends \Exception
{

    public readonly array $errors;
    public readonly array $old;

    public static function throw($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
}
