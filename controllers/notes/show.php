<?php

$config = require __DIR__ . '/../../config/config.php';

$db = new Database($config);


$notes = $db->query('select * from notes where user_id = ?',[$user_id=1])->findAll();


require __DIR__ . '/../../views/notes/index.view.php';
