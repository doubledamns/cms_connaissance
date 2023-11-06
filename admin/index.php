<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>


<?php
  // check if the user is connected
  if($_COOKIE["is_connected"]) {
    require("./admin.php");
  } else {
    require("./login.php");
 
  }
 
?>  

<?php require('../components/injectionsScript.php') ?>
</body>

</html>