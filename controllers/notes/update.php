<?php

use app\Database;
use app\App;
use app\Validator;

$db = App::resolve(Database::class);

$currentUser = 1;
$id = $_POST['id'];
$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_POST['id']]
)->findOrFail();

(authorisation($currentUser === $note['user_id']));

$errors = Validator::string(htmlspecialchars($_POST['header']));

if (empty($errors)) {

    $db->query(
        'UPDATE notes SET header = :header WHERE id = :id',
        [
            'header' => $_POST['header'],
            'id' => $_POST['id'],
        ]
    );

    header('Location: /notes');
    exit();

} else {

    view('/notes/edit.view.php', [
        'id' => $id,
        'note' => $note,
        'errors' => $errors,
    ]);
}