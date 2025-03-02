<?php

$config = require basePath('config/config.php');

$db = new DataBase($config);

$errors = [];
$header = htmlspecialchars($_POST['header']?? '')?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = Validator::string($_POST['header']);

    if (empty($errors)) {
        $textValue = htmlspecialchars($_POST['header']);
        $db->query(
            "INSERT INTO notes (`header`, `user_id`) VALUES (:header, :user_id)",
            [':header' => $textValue, ':user_id' => 1]
        );
    }
}
view('notes/create.view.php',
[
    'errors'=> $errors,
    'header'=>$header,
]);
