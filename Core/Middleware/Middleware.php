<?php

namespace Core\Middleware;



class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve(?string $key) // Allow NULL values
{
    if (!$key) { 
        return; // Simply return if no middleware is specified
    }

    $middleware = static::MAP[$key] ?? false;

    if (!$middleware) {
        throw new \Exception("No matching middleware found for key '{$key}'.");
    }

    (new $middleware)->handle();
}


}