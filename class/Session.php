<?php

namespace App\Class;
class Session 
{
    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
    }

    public static function set(mixed $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(mixed $key, mixed $default = null): mixed 
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function destroy(): void
    {
        session_destroy();
    }
}