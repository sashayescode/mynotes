<?php

use app\Database;
use app\App;

$db = App::resolve(Database::class);
$currentUser = 1;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $note = $db->query(
        'SELECT * FROM notes WHERE id = :id',
        ['id' => $id]
    )->findOrFail();

    (authorisation($currentUser === $note['user_id']));
}

//fix the git auth stuff with the key, so i can commit changes

view('/notes/edit.view.php', [
    'id' => $id,
    'note' => $note,
]);