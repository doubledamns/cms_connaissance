<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>
    <?php


// Vérifiez si la variable de session 'siteId' existe
if (isset($_SESSION['siteId'])) {
    // Accéder à la variable de session 'siteId'
    $siteId = $_SESSION['siteId'];

    // Utiliser la variable $siteId
    echo "L'ID du site est : " . $siteId;
} else {
    echo "La variable de session 'siteId' n'est pas définie.";
}
?>

    <?php require('../components/injectionsScript.php') ?>
</body>

</html>