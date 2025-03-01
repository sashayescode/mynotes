<?php

$routes = require('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
define('PATH', trim($uri, 'public'));

function abort($code){
    
    http_response_code($code);

    require __DIR__ . '/../views/404.php';
    die();
}


function mapping($routePath, $path){
    if(array_key_exists($path, $routePath)){
        require $routePath[$path];
    }else {
        abort(Response::NOT_FOUND);
    }

};

mapping($routes, PATH);