<?php

$router->get('/', 'index.php');

$router->get('/about', 'about.php');

$router->get('/notes', 'notes/show.php');

$router->get('/note', 'notes/note.php');

$router->get('/note/create', 'notes/create.php');
