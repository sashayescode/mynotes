<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body>

    <?php require basePath('partials/navigation.php') ?>

    <h1>Edit a note</h1>


    <form method="POST" action="/note" class="max-w-sm">
        <input type="hidden" name="_method" value="patch">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your note</label>
            <textarea name="header" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $note['header'] ?? '' ?></textarea>
        </div>
        <div>
            <p><?= isset($errors['text']) ? $errors['text'] : '' ?></p>
        </div>
        </div>
        <div class="flex">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            <a href="/notes"
                class="w-full sm:w-auto px-5 py-2.5 bg-white border border-2 border-red-500 text-red-500">Cancel</a>
    </form>

    </div>


</body>

</html>