<?php
session_start();


// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Gérer le cas où l'utilisateur n'est pas connecté
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
    $description = $_POST["Description"]; // Ajouté pour gérer la description, si nécessaire
    $userId = $_SESSION['user_id']; // Récupérer l'ID de l'utilisateur connecté

    // Initialiser une variable pour le chemin du logo
    $logoPath = '';

    // Vérifier et traiter le fichier téléchargé
    if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (in_array($_FILES["img"]["type"], $allowed_types)) {
            $target_dir = "../images/images_sites_Logo/"; // Chemin du répertoire cible
            $target_file = $target_dir . basename($_FILES["img"]["name"]);

            // Déplacer le fichier téléchargé vers le répertoire cible
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $logoPath = $target_file;
            } else {
                echo "There was an error uploading your file.";
                exit();
            }
        } else {
            echo "Error: Only JPG, PNG, and GIF files are allowed.";
            exit();
        }
    }

    // Préparer la requête SQL pour insérer les données
    $sql = "INSERT INTO noms_sites (nom, url, id_user) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nom, $logoPath, $userId);

    // Exécuter la requête SQL
    if ($stmt->execute()) {
        echo "New site created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Fermer l'instruction préparée
    $stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();

// Rediriger vers une autre page après l'insertion
header('Location: ../user/dashboard.php');
exit();
?>
