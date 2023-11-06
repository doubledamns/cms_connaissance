<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <?php require('../components/sidebar.php') ?>

    <?php echo 'test'; ?>
    <div class="p-4 sm:ml-64">
        <section id="creerPage">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Dashboard</h2>

            <div class="flex flex-wrap justify-center">

                <div class="w-72 bg-white border border-gray-200 rounded-lg shadow m-4">
                    <img class="rounded-t-lg w-full h-52 object-contain" src="../images/createPage.jpg" alt="" />
                    <div class="p-5">
                        <a href="creerPage.php">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Créer une page</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">Ici c'est pour créer une page !</p>
                        <a href="creerPage.php" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-300 rounded-lg hover:bg-purple-200 focus:ring-4 focus:outline-none focus:ring-purple-200">
                            Y aller
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="w-72 bg-white border border-gray-200 rounded-lg shadow m-4">
                    <img class="rounded-t-lg w-full h-52 object-contain" src="../images/createLogo.jpg" alt="" />
                    <div class="p-5">
                        <a href="logoSite.php">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Logo du site</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">Envie de changer de logo ? Par ici !</p>
                        <a href="logoSite.php" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-300 rounded-lg hover:bg-purple-200 focus:ring-4 focus:outline-none focus:ring-purple-200">
                            Y aller
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="w-72 bg-white border border-gray-200 rounded-lg shadow m-4">
                    <img class="rounded-t-lg w-full h-52 object-contain" src="../images/menuAJour.jpg" alt="" />
                    <div class="p-5">
                        <a href="menuSite.php">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Menu du site</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">Le menu doit être à jour !</p>
                        <a href="menuSite.php" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-300 rounded-lg hover:bg-purple-200 focus:ring-4 focus:outline-none focus:ring-purple-200">
                            Y aller
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <?php //require('../components/injectionsScript.php') ?>
</body>

</html>