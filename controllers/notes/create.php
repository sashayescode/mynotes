<?php

require basePath('app/Validator.php');

$config = require basePath('config/config.php');

$db = new DataBase($config);

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
require view('notes/create.view.php');
