<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require('../components/head.php'); ?>
    <link rel="stylesheet" href="../css/admin.css">
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
