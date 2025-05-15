<?php

use app\Authenticator;

if(isset($_POST['_method']) && $_POST['_method'] === 'DELETE')
{
    $auth = new Authenticator();
    $auth->logout();
}