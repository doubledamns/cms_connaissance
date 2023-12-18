<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>

<?php
// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Établir la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


// Récupération du nom du site
$stmt = $conn->prepare('SELECT nom FROM noms_sites WHERE id = 1');
if ($stmt->execute()) {
    $stmt->bind_result($nomDuSite);

    $stmt->fetch();
}
$stmt->close(); // Fermeture de la première requête préparée

// Récupération des pages
$stmt2 = $conn2->prepare("SELECT id, title FROM page");

$stmt2->execute();
$result = $stmt2->get_result();
?>
?>


<body>
    <?php require('../components/sidebar.php'); ?>

    <div class="p-4 sm:ml-64">
        <section id="menus">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Gérer les menus</h2>

            <!-- menu -->
            <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                <label for="menu" class="block text-sm font-medium leading-6 text-gray-900">Menu1</label>
                <div class="mt-2">
                    <input placeholder="Nom du menu" type="text" name="menu" id="" autocomplete="" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit mt-6">
                <label for="menuType" class="block text-sm font-medium leading-6 text-gray-900">Choisir une page</label>
                <div class="mt-2">
                    <select name="menuType" id="menuType" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6 pl-4 pr-4">
                        <!-- liste toute les pages stockées dans la BDD -->
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=" . htmlspecialchars($row["id"]) . ">" . htmlspecialchars($row["title"]) . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>


            <!-- bouton annul / Ajouter -->
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <a href="./dashboard.php"><button class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Annuler</button></a>
                <button type="submit" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Ajouter</button>
            </div>

        </section>
    </div>
    <?php require('../components/injectionsScript.php') ?>
</body>

</html>