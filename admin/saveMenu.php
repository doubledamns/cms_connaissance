<?php
session_start();

// Vérifiez si l'utilisateur est connecté et l'ID du site est défini
if (!isset($_SESSION['user_id']) || !isset($_SESSION['siteId'])) {
    header("Location: login.php"); // Redirigez vers la page de connexion ou une autre page
    exit;
}

// Récupération des données du formulaire
$nomMenu = $_POST['menu'] ?? '';
$userId = $_SESSION['user_id'];
$siteId = $_SESSION['siteId'];

// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Insertion des données dans la base de données
$stmt = $conn->prepare("INSERT INTO menu (Nom, id_user, id_site) VALUES (?, ?, ?)");
$stmt->bind_param("sii", $nomMenu, $userId, $siteId);

if ($stmt->execute()) {
    echo "Menu enregistré avec succès.";
} else {
    echo "Erreur lors de l'enregistrement du menu : " . $stmt->error;
}

$stmt->close();
$conn->close();

// Redirection après l'enregistrement
header("Location: dashboard.php");
exit;
?>
