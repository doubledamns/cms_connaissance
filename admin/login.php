<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require('../components/head.php'); ?>
    <link rel="stylesheet" href="../css/admin.css">
    <!-- Ajoutez tout autre fichier CSS ou JS dont vous pourriez avoir besoin ici -->
</head>

<body>
    <!-- Affichage des messages d'erreur -->
    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="error">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']); // Assurez-vous de détruire l'erreur après l'avoir affichée pour qu'elle ne persiste pas.
    }
    ?>

    <!-- Formulaire de connexion -->
    <form action="auth.php" method="POST">
        <div class="login-container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Entrer votre email" name="username" required>

            <label for="password"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <button type="submit" name="connexion">LOGIN</button>
        </div>
    </form>

    <?php require('../components/injectionsScript.php'); ?>
    <!-- Ajoutez tout autre script JS que vous pourriez vouloir exécuter ici -->

</body>
</html>
