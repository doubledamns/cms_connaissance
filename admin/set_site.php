<?php
session_start();

// Vérifiez si l'ID du site est passé en paramètre
if (isset($_GET['id'])) {
    // Définissez l'ID du site dans la session
    $_SESSION['siteId'] = $_GET['id'];

    // Redirigez vers la page souhaitée, par exemple le dashboard du site
    header("Location: ../user/site.php");
} else {
    // Si l'ID du site n'est pas fourni, redirigez vers une page d'erreur ou la liste des sites
    header("Location: error_page.php"); // Remplacez par la page de votre choix
}
exit();
?>
