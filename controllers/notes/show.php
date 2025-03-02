<?php

$config = require basePath('config/config.php');

$db = new Database($config);


$notes = $db->query('select * from notes where user_id = ?',[$user_id=1])->findAll();

view('notes/index.view.php', [
    'notes' => $notes,
]);
