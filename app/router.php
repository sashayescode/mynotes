<?php

namespace app;

use app\middleware\Guest;
use app\middleware\Auth;
use app\middleware\Middleware;

class Router
{
    protected $routes = [];

    protected function add($url, $controllerPath, $method)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controllerPath,
            'method' => $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function post($url, $controllerPath)
    {
        return $this->add($url, $controllerPath, 'POST');
    }

    public function get($url, $controllerPath)
    {
        return $this->add($url, $controllerPath, 'GET');

    }

    public function delete($url, $controllerPath)
    {
        return $this->add($url, $controllerPath, 'DELETE');

    }

    public function put($url, $controllerPath)
    {
        return $this->add($url, $controllerPath, 'PUT');

    }

    public function patch($url, $controllerPath)
    {
        return $this->add($url, $controllerPath, 'PATCH');

    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($url, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === strtoupper($method)) {

                if($route['middleware']){
                    Middleware::resolve($route['middleware']);
                }

                return require basePath("controllers/" . $route['controller']);
            }
        }
        ;
        $this->abort();
    }

    protected function abort($code = 404)
    {

        http_response_code($code);

        view('404.php');
        die();
    }
}