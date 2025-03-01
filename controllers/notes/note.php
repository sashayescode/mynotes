<?php

$config = require __DIR__ . '/../../config/config.php';

$db = new DataBase($config);

$id = $_GET['id']?? null;
$currentUser = 1;

$note = $db->query('select * from notes where id = :id', 
['id'=> $_GET['id']])->findOrFail();

authorisation($note['user_id'] == $currentUser);

require __DIR__ . '/../../views/notes/show.view.php';
