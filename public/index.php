<?php

session_start();

use app\Session;

const BASE_PATH = __DIR__ . '/../';

require __DIR__ . '/../app/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("$class.php");
});

view(view: "bootstrap.php");

$router = new app\Router();

$routes = require basePath('app/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();