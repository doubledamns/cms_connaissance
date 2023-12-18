<?php
if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        $destinationDirectory = '../images/';
        $fileName = uniqid('logo_') . '.' . $fileExtension;

        if (move_uploaded_file($_FILES['img']['tmp_name'], $destinationDirectory . $fileName)) {
            echo "Le logo a été téléchargé avec succès.";

            $server = '127.0.0.1';
            $username = 'root';
            $password = '';
            $database = 'cms_bdd';

            try {
                $connection = new PDO("mysql:host=$server;dbname=$database", $username, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Update query to set the image URL for the record with ID 1
                $sql = "UPDATE noms_sites SET url = :url WHERE id = 1";
                $statement = $connection->prepare($sql);

                $imageUrl = $destinationDirectory . $fileName;
                $statement->bindParam(':url', $imageUrl);

                if ($statement->execute()) {
                    echo "L'URL de l'image a été mise à jour dans la table 'noms_sites' pour l'ID 1.";
                } else {
                    echo "Une erreur s'est produite lors de la mise à jour de l'URL de l'image.";
                }
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        } else {
            echo "Une erreur s'est produite lors de l'upload du logo.";
        }
    } else {
        echo "Le format de fichier n'est pas autorisé. Veuillez télécharger une image au format JPG, JPEG, PNG ou GIF.";
    }
} else {
    echo "Une erreur s'est produite lors de l'upload du fichier. Code d'erreur : " . $_FILES['img']['error'];
}
header('Location: logoSite.php');
exit;
