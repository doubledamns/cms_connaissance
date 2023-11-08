<?php

// Paramètres de connexion à la base de données
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "cms_bdd";

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Établir la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


// Récupération du nom du site
$stmt = $conn->prepare('SELECT nom FROM noms_sites WHERE id = 1');
if ($stmt->execute()) {
    $stmt->bind_result($nomDuSite);

    $stmt->fetch();
}
$stmt->close(); // Fermeture de la première requête préparée

// Récupération des pages
$stmt = $conn->prepare("SELECT id, title FROM page");

$stmt->execute();
$result = $stmt->get_result();
?>

<?php
// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Établir la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

 //Récupération du nom du site et de l'URL
$stmt = $conn->prepare('SELECT nom, url FROM noms_sites WHERE id = 1'); // Modification ici pour inclure l'URL
if ($stmt->execute()) {
    $stmt->bind_result($nomDuSite, $urlDuSite); // Ajout de la variable $urlDuSite

    $stmt->fetch();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>
    <body>
    <?php require('../components/sidebar.php'); ?>  
    </body>
    </body>