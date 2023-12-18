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

    <div class="ml-96 pl-36">
    <!-- Autres contenus ici -->

    <div class="p-4 sm:ml-64">
        <section id="listeMenus">
            <div class="w-72 bg-white border border-gray-200 rounded-lg shadow p-4 gap-5">
                <h3>Liste des Menus</h3>
                <table>
                    <?php  
                    if ($resultMenus->num_rows > 0) {
                        while ($menu = $resultMenus->fetch_assoc()) {
                            echo '<tr>
                                <td>' . htmlspecialchars($menu["Nom"]) . '</td>
                                <td><a href="modifierMenu.php?menu_id=' . $menu["id"] . '">Modifier</a></td>
                                <td><a href="supprimerMenu.php?menu_id=' . $menu["id"] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce menu ?\');">Supprimer</a></td>
                            </tr>';
                        }
                    } else {
                        echo "<tr><td>Aucun menu trouvé pour ce site.</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </section>
    </div>
</div>


    <?php require('../components/injectionsScript.php') ?>
</body>

</html>