<?php
use app\App;

$db = App::resolve('app\Database');


$notes = $db->query('select * from notes where user_id = ?',[$user_id=1])->findAll();

view('notes/index.view.php', [
    'notes' => $notes,
]);
