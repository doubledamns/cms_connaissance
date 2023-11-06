
<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = strip_tags($_POST['username']);
    $passwd = strip_tags($_POST['password']);

    // si infos sont bonne -> renvoyer vers X.php
    $passwd_hash = md5($password);
}
