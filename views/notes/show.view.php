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
        <?= $note['header']??'' ?>
        <p class="block mt-3"></p>
    
        <div class="flex space-x-2">
        <a href="/notes" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Go back</a>
        <form method="post" action="">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?=$note['id']??''?>">
        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
        </form>

        <a href="<?= "/note/edit?id={$note['id']}" ?>">Edit</a>
        </div>
</body>
</html>