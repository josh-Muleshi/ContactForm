<?php
namespace App\Class;
class Request 
{
    public static function get(mixed $key, mixed $default = null): mixed 
    {
        return $_GET[$key] ?? $default;
    }

    public static function post(mixed $key, mixed $default = null): mixed 
    {
        return $_POST[$key] ?? $default;
    }

    public static function file(mixed $key): mixed 
    {
        return $_FILES[$key] ?? null;
    }
}