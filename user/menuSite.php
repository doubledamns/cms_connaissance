<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>
<?php


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Établir la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);


$siteId = $_SESSION['siteId'] ?? null;
// Récupération des menus associés au site sélectionné
$stmt3 = $conn->prepare("SELECT id, Nom FROM menu WHERE id_site = ?");
$stmt3->bind_param("i", $siteId);
$stmt3->execute();
$resultMenus = $stmt3->get_result();

// Récupération des pages associées au site sélectionné
$stmtPages = $conn->prepare("SELECT id, title FROM page WHERE id_site = ?");
$stmtPages->bind_param("i", $siteId);
$stmtPages->execute();
$resultPages = $stmtPages->get_result();

$pages = array();
while ($page = $resultPages->fetch_assoc()) {
    $pages[] = $page;
}


$menus = array();
if ($resultMenus->num_rows > 0) {
    while ($menu = $resultMenus->fetch_assoc()) {
        // Récupérer les pages pour chaque menu
        $stmtPagesMenu = $conn->prepare("SELECT id, title FROM page WHERE id_menu = ?");
        $stmtPagesMenu->bind_param("i", $menu['id']);
        $stmtPagesMenu->execute();
        $resultPagesMenu = $stmtPagesMenu->get_result();

        $menuPages = array();
        while ($page = $resultPagesMenu->fetch_assoc()) {
            $menuPages[] = $page;
        }

        $menu['pages'] = $menuPages;
        $menus[] = $menu;
    }
}


?>

<body>
    <?php require('../components/sidebar.php'); ?>

    <div class="p-4 sm:ml-64">
        <section id="menus">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Gérer les menus</h2>

            <form action="saveMenu.php" method="post">

            <!-- menu -->
            <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                <label for="menu" class="block text-sm font-medium leading-6 text-gray-900">Menu1</label>
                <div class="mt-2">
                    <input placeholder="Nom du menu" type="text" name="menu" id="" autocomplete="" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6">
                </div>
            </div>

            <!-- bouton annul / save -->
            <div class="mt-6 flex items-center justify-start gap-x-6">
            <a href="./dashboard.php"><button class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Annuler</button></a>
                <button type="submit" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Ajouter</button>
            </div>
            </form>

        </section>
    </div>


    <form action="enregistrerModifications.php" method="post">
        <div class="p-4 sm:ml-64">
            <section id="listeMenus">
                <h3 class="pb-12 text-4xl font-semibold text-center md:text-left">Liste des Menus</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($menus as $menu): ?>
                        <div class="bg-white border border-gray-200 rounded-lg shadow p-4 relative" id="menu-<?php echo $menu['id']; ?>">
                            <div class="absolute top-2 right-2 space-x-2">
                                <a href="modifierMenu.php?menu_id=<?php echo $menu["id"]; ?>" class="inline-block">
                                    <svg class="h-8 w-8 text-blue-500" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                    </svg>
                                </a>
                                <a href="supprimerMenu.php?menu_id=<?php echo $menu["id"]; ?>" class="inline-block" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce menu ?');">
                                    <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <line x1="4" y1="7" x2="20" y2="7" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </a>
                                <button type="button" onclick="ajouterPage(<?php echo $menu["id"]; ?>)" class="inline-block">
                                    <svg class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                            <h4 class="text-lg font-semibold"><?php echo htmlspecialchars($menu["Nom"]); ?></h4>
                            <ul>
                                <?php foreach ($menu['pages'] as $page): ?>
                                    <li>
                                        <?php echo htmlspecialchars($page['title']); ?>
                                    <button class="delete-btn hidden" data-page-id="<?php echo $page['id']; ?>">Supprimer</button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-6">
                    <button type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm text-white font-semibold hover:bg-blue-600">Enregistrer les modifications</button>
                </div>
            </section>
        </div>
    </form> 

    <script>
function ajouterPage(menuId) {
    var selectHtml = '<select name="pageId[' + menuId + ']">';
    <?php foreach ($pages as $page): ?>
    selectHtml += '<option value="<?php echo $page['id']; ?>"><?php echo htmlspecialchars($page['title']); ?></option>';
    <?php endforeach; ?>
    selectHtml += '</select>';

    var div = document.createElement('div');
    div.innerHTML = selectHtml;
    document.getElementById('menu-' + menuId).appendChild(div);
}

function toggleDeleteButtons(menuId) {
            var menuElement = document.getElementById('menu-' + menuId);
            var deleteButtons = menuElement.querySelectorAll('.delete-btn');
            deleteButtons.forEach(function(btn) {
                btn.classList.toggle('hidden');
            });
        }

</script>



    <?php require('../components/injectionsScript.php') ?>
</body>

</html>