<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <?php require('../components/sidebar.php') ?>

    <div class="p-4 sm:ml-64">
        <section id="menus">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Gérer les menus</h2>

            <!-- menu -->
            <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                <label for="menu" class="block text-sm font-medium leading-6 text-gray-900">Menu1</label>
                <div class="mt-2">
                    <input placeholder="Nom du menu" type="text" name="menu" id="" autocomplete="" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6">
                </div>
            </div>

            <!-- bouton annul / save -->
            <div class="mt-6 flex items-center justify-start gap-x-6">
            <a href="./dashboard.php"><button class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Annuler</button></a>
                <button type="submit" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Sauvegarder</button>
            </div>

        </section>
    </div>

  <?php require('../components/injectionsScript.php') ?>
</body>

</html>