<?php
 $user = array(
    "id" => "ouchadef@gmail.com",
    "pass" => "1234"
 );

 if($_POST['username'] == $user['id'] && $_POST['password'] == $user['pass']){
    setcookie('is_connected', true, (time()+20*24*60*60));
    header('Location: dashboard.php');
 }
 else {
    echo 'Veillez remplir le champ correctement .............';
 }