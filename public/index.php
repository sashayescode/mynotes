<?php

const BASE_PATH = __DIR__ . '/../';

require __DIR__ . '/../app/functions.php';

spl_autoload_register(function($class){
    require basePath("app/$class.php");
});

require basePath('app/router.php');
