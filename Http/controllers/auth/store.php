<?php

use app\Authenticator;
use app\Session;
use app\ValidationExpection;
use Http\Forms\LoginValidation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    try{
        $form = LoginValidation::validate($attributes = [
            'email' => htmlspecialchars($_POST['email']),
            'password' => htmlspecialchars($_POST['password']),
        ]);
    }catch(ValidationExpection $expection){
        dd('caught');
    }


    $auth = new Authenticator();
    if ($auth->attempt($attributes['email'], $attributes['password'])) {
        redirect('/');
    } else {
        $form->error('password', 'Invalid email or password');
    }
}

Session::flash('errors', $form->getErrors());
Session::flash('old', [
    'email' => $_POST['email'],
]);

redirect('/login');
