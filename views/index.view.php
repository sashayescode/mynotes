<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body>
    
<?php require basePath('partials/navigation.php') ?>

<p>Hello <?= isset($_SESSION['user']['email']) && isset($_SESSION['user']['name']) ? htmlspecialchars($_SESSION['user']['name']) : 'Guest' ?></p>
 

    <h1><?= $header ?></h1>

</body>

</html>