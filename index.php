<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BDC WordPress</title>

<script src="https://cdn.tiny.cloud/1/wesq6pzh85nnregorlsyzqemt5nzeua0na48mu0knruk158l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!--Favicons-->
<link rel="icon" type="image/png" href="images/logo-BDC.png">

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


</head>

<body>
    

    <?php require('components/injectionsScript.php') ?>

<body class="bg-purple-400 flex justify-center items-center h-screen">
    <div>
        <h1 class="text-4xl text-white mb-6 text-center">Bienvenue sur notre site</h1>
        <a href="connexion/login.php" class="block w-48 mx-auto p-4 bg-purple-600 text-white rounded-full text-center hover:bg-purple-900">Se connecter</a>
        <a href="connexion/inscription.php" class="block w-48 mx-auto p-4 bg-purple-600 text-white rounded-full text-center hover:bg-purple-900">Inscription</a>
    </div>
  
    <?php require('./components/injectionsScript.php');?>
</body>


</html>
