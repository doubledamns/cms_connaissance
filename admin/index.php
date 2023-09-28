<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDC WordPress</title>
    <link href="../css/admin.css" rel="stylesheet"/>
      <!--Tailwinds-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/default.js"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
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
</body>

</html>