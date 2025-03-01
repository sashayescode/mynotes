<?php

require __DIR__ . '/../../app/Validator.php';

$config = require __DIR__ . '/../../config/config.php';

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
require __DIR__ . '/../../views/notes/create.view.php';
