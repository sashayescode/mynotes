<?php

namespace app;

class Session
{
    public static function has($key)
    {
        return (bool) static::get($key);
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (isset($_SESSION['_flashed'][$key])) {
            return $_SESSION['_flashed'][$key];
        }
        return $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flashed'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flashed']);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    public static function old($key, $default = '')
    {
        return static::get('old')[$key] ?? $default;
    }
}
