<?php
session_start(); // Démarre la session

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pageId']) && is_array($_POST['pageId'])) {
        foreach ($_POST['pageId'] as $menuId => $pageId) {
            // Mise à jour de l'ID du menu dans la table `page`
            $stmt = $conn->prepare("UPDATE page SET id_menu = ? WHERE id = ?");
            $stmt->bind_param("ii", $menuId, $pageId);
            $stmt->execute();
        }
    }
    // Redirection ou message de succès
    echo "Modifications enregistrées avec succès.";
}
?>