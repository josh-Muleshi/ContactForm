<?php

namespace App\Class;
class Cookie {
    public static function set(mixed $key, mixed $value, mixed $expiry) 
    {
        setcookie($key, $value, time() + $expiry, "/");
    }

    public static function get(mixed $key, mixed $default = null): mixed {
        return $_COOKIE[$key] ?? $default;
    }
}