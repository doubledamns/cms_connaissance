<!DOCTYPE html>

<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
<!-- formulaire connection -->
 <form action="auth.php" id="clickform" method="POST">
 
    <!-- champs nom utilisateur -->
    <label><b>Email</b></label>
    <input type="text" id="email" placeholder="Entrer votre email" name="username">

    <!-- champs mot de passe -->
    <label><b>Mot de passe</b></label>
    <input type="password" id="password" placeholder="Entrer le mot de passe" name="password">

    <!-- bouton se connecter -->
    <input type="submit" id='submit' name="connexion" value='LOGIN'></form>
    <script src="../js/default.js"></script> 

    <?php require('./components/injectionsScript.php');?>
</body>

</html>