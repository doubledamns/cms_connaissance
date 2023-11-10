<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BDC WordPress</title>

<script src="https://cdn.tiny.cloud/1/wesq6pzh85nnregorlsyzqemt5nzeua0na48mu0knruk158l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!--Favicons-->
<link rel="icon" type="image/png" href="images/logo-BDC.png">
<link rel="stylesheet" href="../css/admin.css">
<!--Tailwinds-->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    purple: {
                        100: '#B5A5DF',
                        200: '#9277CF'
                    }
                }
            }
        },
        plugins: [
            require('@tailwindcss/forms'),
            require('flowbite/plugin')
        ]
    }
</script>
 
    <!-- Ajoutez tout autre fichier CSS ou JS dont vous pourriez avoir besoin ici -->
</head>

<body class="flex items-center justify-center h-screen  bg-purple-300">
    <!-- Affichage des messages d'erreur -->
    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="error">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']); // Assurez-vous de détruire l'erreur après l'avoir affichée pour qu'elle ne persiste pas.
    }
    ?>

    <!-- Formulaire de connexion -->
    <?php require('../components/formUser.php'); ?>

    <?php require('../components/injectionsScript.php'); ?>
    <!-- Ajoutez tout autre script JS que vous pourriez vouloir exécuter ici -->

</body>
</html>
