<?php

use app\Container;
use app\DataBase;
use app\App;

$container = new Container();

$container->bind('app\Database', function (){
    $config = require basePath('config/config.php');

    return new DataBase($config);

});

$db = $container->resolve('app\Database');

App::setContainer($container);
