<?php

use app\Response;

function dd($arrayItem)
{
    echo '<pre>';
    var_dump($arrayItem);
    echo '</pre>';
    die();
}

function authorisation($condition, $responseCode = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($responseCode);
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($view, $attributes = [])
{
    extract($attributes);
    require basePath("views/$view");
}


function login($user)
{
    $_SESSION['user']['email'] = $user['email'];
    $_SESSION['user']['name'] = $user['name'];
    header('Location: /');
    exit();
}

function logout()
{
    $_SESSION = [];
    header('Location: /login');
    exit();
}