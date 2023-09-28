<?php
// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $title = $_POST["title"];
    $content = $_POST["content"];
    
    // Vérification et traitement du fichier téléchargé
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        
        // Déplacement du fichier téléchargé vers le répertoire cible
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Préparation de la requête SQL
            $stmt = $conn->prepare("INSERT INTO page (title, content, img) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $content, $target_file);
            
            // Exécution de la requête SQL
            if ($stmt->execute()) {
                echo "Nouvelle page créée avec succès.";
            } else {
                echo "Erreur: " . $stmt->error;
            }
            
            // Fermeture de la requête préparée
            $stmt->close();
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    } else {
        echo "Erreur: Fichier non téléchargé ou autre erreur.";
    }
}

// Fermeture de la connexion
$conn->close();
?>

