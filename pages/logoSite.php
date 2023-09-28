<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <?php require('../components/sidebar.php') ?>

    <div class="p-4 sm:ml-64">
        <section id="logoSite">
        <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Changer le logo du site</h2>
            <div class="col-span-full shadow-lg p-4 rounded-lg w-fit">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
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