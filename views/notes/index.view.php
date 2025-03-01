<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body>

    <?php require __DIR__ . '/../../partials/navigation.php' ?>

    <h1>Hi notes page</h1>
    <ul class="list-disc list-inside">
        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="<?= "/note?id={$note['id']}" ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    <?= htmlspecialchars($note['header']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="/note/create" class="text-yellow-500">Create a note</a></p>

</body>

</html>