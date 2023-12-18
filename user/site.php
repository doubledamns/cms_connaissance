<?php require('head-Site.php'); if (isset($_GET['id'])) {
    // Stockez l'ID dans une variable de session
    $_SESSION['siteId'] = $_GET['id'];
} else {
    // Gérer le cas où l'ID n'est pas dans l'URL, par exemple en définissant une valeur par défaut
    $_SESSION['siteId'] = 0; // ou toute autre valeur par défaut appropriée
}
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
            <img class="w-full h-full" src="<?php echo $urlDuSite?>" alt="Logo BDC">
            <h2><?php echo $nomDuSite?></h2>
        </div>
    </div>
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