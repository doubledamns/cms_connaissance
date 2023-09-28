<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <form action="auth.php" id="clickform" method="post">
        <label><span class='utili'>Nom d'utilisateur:</span></label><br />
        <input type="text" name="email" id="email"><br />
        <label for="password"><span class='mp'>Mot de passe:</span></label><br />
        <input type="password" name="password" id="password">
        <pre></pre>
        <button type="submit">Connexion</button>
    </form>

    <?php require('../components/injectionsScript.php') ?>
</body>

</html>