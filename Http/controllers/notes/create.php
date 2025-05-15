<?php
use app\App;
use app\Database;
use app\Validator;

$db = App::resolve(Database::class);

$errors = [];
$header = htmlspecialchars($_POST['header']?? '')?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $errors = Validator::string($_POST['header']);

    if (empty($errors)) {
        $textValue = htmlspecialchars($_POST['header']);
        $db->query(
            "INSERT INTO notes (`header`, `user_id`) VALUES (:header, :user_id)",
            [':header' => $textValue, ':user_id' => 1]
        );
    }

    header('Location: /notes');
    exit();
}
view('notes/create.view.php',
[
    'errors'=> $errors,
    'header'=>$header,
]);
