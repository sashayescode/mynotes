<?php

use app\App;
use app\Validator;
use app\Database;


$db = App::resolve(Database::class);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);


    if (!empty(Validator::email($email))) {
        $errors['email'] = Validator::$errors['text'];
    }

    if (!empty(Validator::string($password, 1))) {
        $errors['password'] = Validator::$errors['text'];
    }

    $user = $db->query('select * from users where email = :email', [
        'email' => $email,
    ])->find();

    if ($user) {
        if ($email === $user['email']) {
            if (password_verify($password, $user['password'])) {
                login($user);
            };
        };
    }else{
        $errors['password'] = 'No such user';
    }
}

if (!empty($errors)) {
    view('auth/login.view.php', [
        'errors' => $errors,
    ]);
}
