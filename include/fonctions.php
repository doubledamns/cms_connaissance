<?php

function connectToBase(){

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "cms_bdd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);    
}

}?> 