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


// PHP: Récupération des menus et des pages associées
foreach ($menus as $key => $menu) {
    $stmtPagesMenu = $conn->prepare("SELECT id, title FROM page WHERE id_menu = :menuId");
    $stmtPagesMenu->bindParam(':menuId', $menu['id'], PDO::PARAM_INT);
    $stmtPagesMenu->execute();
    $pages = $stmtPagesMenu->fetchAll(PDO::FETCH_ASSOC);

    $menus[$key]['pages'] = $pages;
}


foreach ($menus as $key => $menu) {
    $stmtPagesMenu = $conn->prepare("SELECT id, title, img, content FROM page WHERE id_menu = :menuId");
    $stmtPagesMenu->bindParam(':menuId', $menu['id'], PDO::PARAM_INT);
    $stmtPagesMenu->execute();
    $pages = $stmtPagesMenu->fetchAll(PDO::FETCH_ASSOC);

    $menus[$key]['pages'] = $pages;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>
<div class="top-right-buttons">
    <button id="hideSidebarBtn" class="hide-sidebar-btn">
    <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z"/>
        <polyline points="16 4 20 4 20 8" />
        <line x1="14" y1="10" x2="20" y2="4" />
        <polyline points="8 20 4 20 4 16" />
        <line x1="4" y1="20" x2="10" y2="14" />
        <polyline points="16 20 20 20 20 16" />
        <line x1="14" y1="14" x2="20" y2="20" />
        <polyline points="8 4 4 4 4 8" />
        <line x1="4" y1="4" x2="10" y2="10" />
    </svg>
</button>
</div>

    <!-- Bouton pour afficher la sidebar -->
    <button id="showSidebarBtn" class="show-sidebar-btn hidden">
    <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z"/>
        <polyline points="5 9 9 9 9 5" />
        <line x1="3" y1="3" x2="9" y2="9" />
        <polyline points="5 15 9 15 9 19" />
        <line x1="3" y1="21" x2="9" y2="15" />
        <polyline points="19 9 15 9 15 5" />
        <line x1="15" y1="9" x2="21" y2="3" />
        <polyline points="19 15 15 15 15 19" />
        <line x1="15" y1="15" x2="21" y2="21" />
    </svg>
</button>
<body>
    <?php require('../components/sidebar.php'); ?>

    <?php require('../components/sidebar_sous_site.php'); ?>

    
<!-- En-tête avec logo et titre du site -->
<header class="bg-white shadow fixed top-0 left-0 right-0 z-50">
        <div class="flex justify-between items-center px-6 py-4">
            <div class="flex items-center">
                <img class="h-12 w-12 mr-3" src="<?php echo htmlspecialchars($urlDuSite); ?>" alt="Logo du site">
                <h1 class="text-3xl font-bold text-gray-900"><?php echo $nomDuSite; ?></h1>
            </div>
            <!-- Autres éléments de l'en-tête si nécessaire -->
        </div>
    </header>



        <!-- Contenu principal -->
        <div class="pt-16"> <!-- Ajout d'un padding en haut pour compenser la hauteur de l'en-tête -->
        <div class="ml-96 pl-36">
            <!-- Autres contenus de la page -->
        </div>
        <nav class="bg-purple-300 shadow-md">
            <ul class="flex justify-center space-x-4 p-4">
                <li>
                    <a href="set_site.php?id=<?php echo htmlspecialchars($siteId); ?>" class="inline-flex items-center p-2 text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        <span class="ml-2">Accueil</span>
                    </a>
                </li>
                <?php foreach ($menus as $menu): ?>
                <li class="relative group">
                    <a href="#" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus:outline-none">
                        <?php echo htmlspecialchars($menu['Nom']); ?>
                    </a>
                    <div class="absolute hidden group-hover:block bg-white shadow-lg mt-1 rounded-md overflow-hidden z-10">
                        <?php foreach ($menu['pages'] as $page): ?>
                            <a href="#" onclick="loadPageContent(<?php echo $page['id']; ?>)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <?php echo htmlspecialchars($page['title']); ?>
                            </a>

                        <?php endforeach; ?>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        </nav>
    </div>



    <div id="pageContent" class="page-content mt-8 max-w-4xl mx-auto">
    <!-- Le contenu de la page sera chargé ici -->
</div>


    <?php require('./footer.php') ?>
</body></html>


<style>
    #second-sidebar {
    display: none; /* Cache initialement la seconde barre latérale */
}
.hidden {
    display: none;
}
.top-right-buttons {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000; /* Assurez-vous que cela est au-dessus de tout autre contenu */
        }

        /* Styles pour les menus déroulants */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
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

document.addEventListener("DOMContentLoaded", function() {
    var hideSidebarBtn = document.getElementById('hideSidebarBtn');
    var showSidebarBtn = document.getElementById('showSidebarBtn');
    var sidebar = document.getElementById('default-sidebar'); // Assurez-vous que c'est l'ID correct de votre sidebar

    hideSidebarBtn.addEventListener('click', function() {
        sidebar.style.display = 'none';
        hideSidebarBtn.classList.add('hidden');
        showSidebarBtn.classList.remove('hidden');
    });

    showSidebarBtn.addEventListener('click', function() {
        sidebar.style.display = 'block';
        showSidebarBtn.classList.add('hidden');
        hideSidebarBtn.classList.remove('hidden');
    });
});





function loadPageContent(pageId) {
    fetch('loadPage.php?pageId=' + pageId)
    .then(response => response.json())
    .then(data => {
    const pageContentDiv = document.getElementById('pageContent');
    const imagePath = '../' + data.img; // Chemin relatif vers le dossier images
    pageContentDiv.innerHTML = `
        <article class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-4">${data.title}</h1>
            <img class="w-full rounded-lg mb-4" src="${imagePath}" alt="Image" />
            <p class="text-gray-700 text-lg">${data.content}</p>
        </article>
    `;
})



    .catch(error => console.error('Erreur:', error));
}




</script>