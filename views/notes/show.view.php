<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body>

    <?php require basePath('partials/navigation.php') ?>

    <h1>Hi current note page</h1>
        <?= $note['header'] ?>
        <p class="block mt-3"></p>
    
        <a href="/notes" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Go back</a>
</body>

</html>