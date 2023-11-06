<!DOCTYPE html>
<html lang="en">
<head>

    <?php require('components/head.php') ?>
</head>

<body>
    <header>
        <?php require('components/sidebar.php') ?>
    </header>

    <?php require('components/injectionsScript.php') ?>

<body class="bg-purple-400 flex justify-center items-center h-screen">
    <div>
        <h1 class="text-4xl text-white mb-6 text-center">Bienvenue sur notre site</h1>
        <a href="admin/login.php" class="block w-48 mx-auto p-4 bg-purple-600 text-white rounded-full text-center hover:bg-purple-900">Se connecter</a>
    </div>
  
    <?php require('./components/injectionsScript.php');?>
</body>


</html>
