<?php
print_r($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
    <link rel="stylesheet" href="../css/admin.css">
    
</head>

<body>

 <form action="auth.php" id="clickform" method="POST">
 
 <label><b>Nom d'utilisateur</b></label>
 <input type="text" id="email" placeholder="Entrer le nom d'utilisateur" name="username">

 <label><b>Mot de passe</b></label>
 <input type="password" id="password" placeholder="Entrer le mot de passe" name="password">

 <input type="submit" id='submit' value='LOGIN' ></form>
 <script src="../js/default.js"></script> 

    <?php require('../components/injectionsScript.php') ?>
</body>

</html>