<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDC WordPress</title>

    <!--Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>

<form id="createForm" enctype="multipart/form-data" action="fonctions.php" method="post">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">Texte :</label>
        <textarea id="content" name="content" rows="4" required></textarea>
        
        <label for="file">Choisir un fichier :</label>
        <input type="file" id="file" name="file" required>
        
        <button type="submit">Créer la Page</button>
    </form>

<body>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>

</body>

</html>



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
