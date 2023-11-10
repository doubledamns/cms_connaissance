<?php
$mode = isset($_GET['mode']) ? $_GET['mode'] : 'login';
$isRegistration = $mode == 'add';
?>

<form action="<?php echo $isRegistration ? 'inscription.php' : ($mode == 'edit' ? 'edit_user.php' : 'auth.php'); ?>" method="POST" class="bg-purple-400 p-8 rounded-lg shadow-lg max-w-md mx-auto">
    <div class="space-y-6">
        <!-- Les champs du formulaire -->
        <div>
            <label for="email" class="block text-white text-lg mb-2">Email</label>
            <input type="text" placeholder="Entrer votre email" name="username" required class="w-full px-4 py-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div>

        <div>
            <label for="password" class="block text-white text-lg mb-2">Mot de passe</label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required class="w-full px-4 py-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div>

        <?php if ($isRegistration): ?>
        <div>
            <label for="confirm_password" class="block text-white text-lg mb-2">Confirmer le mot de passe</label>
            <input type="password" placeholder="Confirmer le mot de passe" name="confirm_password" required class="w-full px-4 py-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div>
        <?php endif; ?>

        <!-- Bouton du formulaire -->
        <button type="submit" name="action" value="<?php echo $isRegistration ? 'inscription' : ($mode == 'edit' ? 'modifier' : 'connexion'); ?>" class="w-full bg-purple-500 text-white text-lg py-3 px-4 rounded-lg hover:bg-purple-800 focus:outline-none focus:bg-purple-900">
            <?php echo $isRegistration ? 'Inscription' : ($mode == 'edit' ? 'Modifier' : 'Connexion'); ?>
        </button>
    </div>
</form>

