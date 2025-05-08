<?php

$router->get('/', 'index.php');

$router->get('/about', 'about.php');

$router->get('/notes', 'notes/show.php')->only('auth');

$router->get('/note', 'notes/note.php');

$router->get('/note/create', 'notes/create.php');

$router->post('/note/create', 'notes/create.php');

$router->delete('/note', 'notes/note.php');

$router->get('/note/edit', 'notes/edit.php');

$router->patch('/note', 'notes/update.php');

$router->get('/register', 'registration/create.php')->only('auth');

$router->post('/register', 'registration/store.php');
