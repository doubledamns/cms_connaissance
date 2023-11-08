<?php
if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $extensionsAutorisees = array('jpg', 'jpeg', 'png', 'gif');
    $extensionFichier = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

    if (in_array(strtolower($extensionFichier), $extensionsAutorisees)) {
        $repertoireDestination = '../images/';
        $nomFichier = uniqid('logo_') . '.' . $extensionFichier;

        if (move_uploaded_file($_FILES['img']['tmp_name'], $repertoireDestination . $nomFichier)) {
            echo "Le logo a été téléchargé avec succès.";
            // Enregistrez le chemin du fichier dans la base de données ou effectuez d'autres opérations nécessaires.
        } else {
            echo "Une erreur s'est produite lors de l'upload du logo.";
        }
    } else {
        echo "Le format de fichier n'est pas autorisé. Veuillez télécharger une image au format JPG, JPEG, PNG ou GIF.";
    }
} else {
    echo "Une erreur s'est produite lors de l'upload du logo.";
}
?>
