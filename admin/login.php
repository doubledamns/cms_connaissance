<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
    <link rel="stylesheet" href="../css/admin.css">
    
</head>

<body>
    <!-- <form action="auth.php" id="clickform" method="post"> -->
        <!-- <label><span class='utili'>Nom d'utilisateur:</span></label><br /> -->
        <!-- <input type="text" name="email" id="email"><br /> -->
        <!-- <label for="password"><span class='mp'>Mot de passe:</span></label><br /> -->
        <!-- <input type="password" name="password" id="password"> -->
        <!-- <pre></pre> -->
        <!-- <button type="submit">Connexion</button> -->
    <!-- </form> -->

 <form action="auth.php" id="clickform" method="POST">
 <h1>Connexion</h1>
 
 <label><b>Nom d'utilisateur</b></label>
 <input type="text" id="email" placeholder="Entrer le nom d'utilisateur" name="username">

 <label><b>Mot de passe</b></label>
 <input type="password" id="password" placeholder="Entrer le mot de passe" name="password">

 <input type="submit" id='submit' value='LOGIN' ></form>
 <script src="../js/default.js"></script> 

    <?php require('../components/injectionsScript.php') ?>
</body>

</html>