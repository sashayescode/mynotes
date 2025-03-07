<?php

namespace app;

class Router
{
    protected $routes = [];

    public function post($url, $controllerPath)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controllerPath,
            'method' => 'POST',
        ];
    }

    public function get($url, $controllerPath)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controllerPath,
            'method' => 'GET',
        ];
    }

    public function delete($url, $controllerPath)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controllerPath,
            'method' => 'DELETE',
        ];
    }

    public function put($url, $controllerPath)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controllerPath,
            'method' => 'PUT',
        ];
    }

    public function patch($url, $controllerPath)
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controllerPath,
            'method' => 'PATCH',
        ];
    }

    public function route($url, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === strtoupper($method)) {
                
                return require basePath("controllers/" . $route['controller']);
            }
        };
        $this->abort();
    }

    protected function abort($code = 404)
    {

        http_response_code($code);

        view('404.php');
        die();
    }
}


// <?php

// use app\Response;

// $routes = require('routes.php');
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// define('PATH', trim($uri, 'public'));




// function mapping($routePath, $path){
//     if(array_key_exists($path, $routePath)){
//         require $routePath[$path];
//     }else {
//         abort(Response::NOT_FOUND);
//     }

// };

// mapping($routes, PATH);