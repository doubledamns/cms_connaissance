<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
<h1 class="text-3xl font-bold underline">
    Hello world!
</h1>

<?php
  // check if the user is connected
  if(!isset($_COOKIE["is_connected"])) {
    require("./admin.php");
  } else {
    require("./login.php");
 
  }
 
?>  

<?php require('../components/injectionsScript.php') ?>
</body>

</html>