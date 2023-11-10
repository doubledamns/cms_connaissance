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
    <div class="flex items-center justify-center h-screen bg-purple-300">
    <!-- Formulaire de connexion -->
    <form action="auth.php" method="POST" class="bg-purple-400 p-8 rounded-lg shadow-lg max-w-md">
        <div class="space-y-6">
            <div>
                <label for="email" class="block text-white text-lg mb-2">Email</label>
                <input type="text" placeholder="Entrer votre email" name="mail" required class="w-full px-4 py-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div>
                <label for="password" class="block text-white text-lg mb-2">Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp" required class="w-full px-4 py-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div>
                <label for="password" class="block text-white text-lg mb-2">Confirmation Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp2" required class="w-full px-4 py-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <button type="submit" name="Inscription" class="w-full bg-purple-500 text-white text-lg py-3 px-4 rounded-lg hover:bg-purple-800 focus:outline-none focus:bg-purple-900">Inscription</button>
        </div>
    </form>
</div>




    <?php require('../components/injectionsScript.php'); ?>
    <!-- Ajoutez tout autre script JS que vous pourriez vouloir exécuter ici -->

</body>
</html>
