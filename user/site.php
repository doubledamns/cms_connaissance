<?php
require('head-Site.php');
require('../components/head.php');

if (isset($_GET['id'])) {
    $_SESSION['siteId'] = $_GET['id'];
} elseif (!isset($_SESSION['siteId'])) {
    $_SESSION['siteId'] = 0; // ou toute autre valeur par défaut appropriée
}

$siteId = $_SESSION['siteId'];

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=cms_bdd", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT nom, url FROM noms_sites WHERE id = :siteId");
    $stmt->bindParam(':siteId', $siteId, PDO::PARAM_INT);
    $stmt->execute();

    $siteInfo = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$nomDuSite = $siteInfo['nom'] ?? 'Nom par défaut';
$urlDuSite = $siteInfo['url'] ?? 'url_par_défaut.jpg';

// Récupération des menus associés au site sélectionné
$stmtMenus = $conn->prepare("SELECT id, Nom FROM menu WHERE id_site = :siteId");
$stmtMenus->bindParam(':siteId', $siteId, PDO::PARAM_INT);
$stmtMenus->execute();
$menus = $stmtMenus->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>

    <?php require('../components/sidebar_sous_site.php'); ?>
    <div class="ml-96 pl-36">
        <div class="w-52 h-52">
            <img class="w-full h-full" src="<?php echo htmlspecialchars($urlDuSite); ?>" alt="Image du site">
            <h2><?php echo $nomDuSite?></h2>
        </div>
    </div>
    <nav class="bg-purple-300 p-4 shadow-md">
    <ul class="flex space-x-4">
        <?php foreach ($menus as $menu): ?>
            <li>
                <a href="<?php echo '#'; // Remplacez par l'URL réelle du menu ?>" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-purple-200">
                    <?php echo htmlspecialchars($menu['Nom']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

    <?php require('./footer.php') ?>
</body></html>


<style>
    #second-sidebar {
    display: none; /* Cache initialement la seconde barre latérale */
}

</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var listItems = document.querySelectorAll('.affichage'); // Sélectionne tous les éléments avec la classe 'affichage'
    var secondSidebar = document.getElementById('second-sidebar');
    var isHoveringOverSidebar = false; // Indicateur pour savoir si la souris est sur la seconde barre latérale

    // Affiche la seconde barre latérale lors du survol des éléments de la première barre latérale
    listItems.forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            secondSidebar.style.display = 'block';
        });
    });

    // Maintient la seconde barre latérale affichée lors du survol
    secondSidebar.addEventListener('mouseenter', function() {
        isHoveringOverSidebar = true;
    });

    // Cache la seconde barre latérale lorsque la souris quitte la seconde barre latérale
    secondSidebar.addEventListener('mouseleave', function() {
        isHoveringOverSidebar = false;
        secondSidebar.style.display = 'none';
    });

    // Cache la seconde barre latérale si la souris quitte les éléments de la première barre latérale et n'est pas sur la seconde barre latérale
    document.addEventListener('mousemove', function(event) {
        if (!event.target.closest('.affichage') && !isHoveringOverSidebar) {
            secondSidebar.style.display = 'none';
        }
    });
});



</script>