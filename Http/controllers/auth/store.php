<?php

use app\Authenticator;
use app\Session;
use Http\Forms\LoginValidation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $form = new LoginValidation();

    if ($form->validate($email, $password)) {
        $auth = new Authenticator();
        if ($auth->attempt($email, $password)) {
            redirect('/');
        } else {
            $form->error('password', 'Invalid email or password');
        }
    }
}

Session::flash('errors', $form->getErrors());

redirect('/login');
