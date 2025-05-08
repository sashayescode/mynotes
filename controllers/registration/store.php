<?php

use app\Validator;
use app\Database;
use app\App;

$db = App::resolve(Database::class);

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$name = htmlspecialchars($_POST['name']);

$errors = [];

if (!empty(Validator::email($email))) {
    $error = Validator::email($email);
    $errors['email'] = $error['text'];
}

if (!empty(Validator::string($password, 7, 15))) {
    $error = Validator::string($password, 7, 15);
    $errors['password'] = $error['text'];
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

if ($user) {
    $errors['email'] = 'This email already exists';
} else {
    $db->query('insert into users (email, password, name) values (:email, :password, :name)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'name' => $name,
    ]);

    $_SESSION['loggedIn'] = true;
    $_SESSION['name'] = $name;
}

if (!empty($errors)) {
    view('/registration/create.view.php', [
        'errors' => $errors,
    ]);
    exit();
}

header('Location: /');
exit();
