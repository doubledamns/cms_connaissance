<?php
session_start();

// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Vérifiez si l'ID du site est défini dans la session
if (!isset($_SESSION['siteId'])) {
    // Gérez l'absence de siteId
    header("Location: selectionner_site.php");
    exit;
}

$siteId = $_SESSION['siteId'];
$instagram = $_POST['instagram'];
$facebook = $_POST['facebook'];
$linkedin = $_POST['linkedin'];

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Mise à jour des réseaux sociaux dans la base de données
$stmt = $conn->prepare("UPDATE noms_sites SET Instagram = ?, Facebook = ?, Linkedin = ? WHERE id = ?");
$stmt->bind_param("sssi", $instagram, $facebook, $linkedin, $siteId);

if ($stmt->execute()) {
    echo "Réseaux sociaux mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour des réseaux sociaux : " . $stmt->error;
}

$stmt->close();
$conn->close();

// Redirection après la mise à jour
header("Location: reseauxSociaux.php");
exit;
?>
