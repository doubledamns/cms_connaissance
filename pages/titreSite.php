<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <?php require('../components/sidebar.php') ?>

    <div class="p-4 sm:ml-64">
        <section id="titleSite">
            <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Titre du site</label>
                <div class="mt-2">
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-200 sm:text-sm sm:leading-6">
                </div>

            </div>
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="button" class="rounded-md bg-purple-100 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100">Cancel</button>
                <button type="submit" class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-100">Save</button>
            </div>
        </section>
    </div>

    <?php require('../components/injectionsScript.php') ?>
</body>

</html>