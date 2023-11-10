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

// Vérifier si l'ID est présent
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparation de la requête de suppression
    $stmt = $conn->prepare("DELETE FROM page WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "La page a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de la page : " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Aucun ID fourni pour la suppression.";
}

// Fermeture de la connexion
$conn->close();

// Redirection vers la liste des pages
header("Location: listePage.php");
exit;
?>
