<?php
session_start();

// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: ../connexion/login.php");
    exit();
}

// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Créer la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["title"];
    $description = $_POST["Description"];
    $userId = $_SESSION['user_id'];

    // (Traitement de l'image et autres opérations...)

    // Préparer la requête SQL pour insérer les données du site
    $sql = "INSERT INTO noms_sites (nom, url, id_user) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nom, $logoPath, $userId);

    // Exécuter la requête SQL
    if ($stmt->execute()) {
        echo "New site created successfully.";

        // Récupérer l'ID du nouveau site
        $newSiteId = $conn->insert_id;

        // Créer une page d'accueil par défaut pour le nouveau site
        $sqlPage = "INSERT INTO page (title, content, home, id_site) VALUES ('Accueil', 'Bienvenue sur votre nouvelle page d\'accueil!', 1, ?)";
        $stmtPage = $conn->prepare($sqlPage);
        $stmtPage->bind_param("i", $newSiteId);

        if ($stmtPage->execute()) {
            echo "Default home page created successfully.";
        } else {
            echo "Error creating home page: " . $stmtPage->error;
        }
        $stmtPage->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

header('Location: ../user/dashboard.php');
exit();
?>
