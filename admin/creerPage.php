<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <?php require('../components/sidebar.php') ?>

    <div class="p-4 sm:ml-64">
        <section id="creerPage">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Créer une page</h2>
            <form id="createForm" method="post" action="../submit.php" enctype="multipart/form-data">
                <div class="space-y-6">
                    <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Titre de la page</label>
                        <div class="mt-2">
                            <input placeholder="Titre de la page" type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="shadow-lg p-4 rounded-lg w-fit">
                        <textarea  id="content" name="content"> Welcome to TinyMCE! </textarea>
                    </div>

                    <div class="col-span-full shadow-lg p-4 rounded-lg w-fit">
                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <input type="file" id="img" name="img">
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF jusqu'à 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <a href="./dashboard.php"><button class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Annuler</button></a>
                <button type="submit" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Sauvegarder</button>
            </div>
            </form>     
        </section>
    </div>

    <?php require('../components/injectionsScript.php') ?>
    <!-- Script TinyMCE -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
</body>

</html>