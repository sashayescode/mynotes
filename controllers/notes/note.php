<?php

use app\App;

$db = App::resolve('app\Database');

$currentUser = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $note = $db->query(
        'select * from notes where id = :id',
        ['id' => $_GET['id']]
    )->findOrFail();

    authorisation($note['user_id'] == $currentUser);

    $db->query('delete from notes where id = :id', [
        'id' => htmlspecialchars($_POST['id'] ?? '')
    ]);
    header('Location: /notes');
    exit();
} else {

    $id = $_GET['id'] ?? null;

    $note = $db->query(
        'select * from notes where id = :id',
        ['id' => $_GET['id']]
    )->findOrFail();

    authorisation($note['user_id'] == $currentUser);
}

view('notes/show.view.php', [
    'note' => $note,
]);
