<?php

namespace app\middleware;

use Exception;
class Middleware
{

    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public static function resolve($key)
    {
        if(!array_key_exists($key, static::MAP))
        {
            throw new Exception('No such middleware');
        }
        $middleware = static::MAP[$key];
        (new $middleware)->handle();
    }

}