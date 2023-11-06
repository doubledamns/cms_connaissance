<?php
setcookie("is_connected", false, time()-(60*60*24*7));
unset($_COOKIE["is_connected"]);
header('Location: /admin');

