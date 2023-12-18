<!DOCTYPE html>
<html lang="en">
<?php
// Paramètres de connexion à la base de données
$servername = "Localhost";
$username = "root";
$password = "root";
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
<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
<?php require('../components/sidebar.php'); ?>
    <?php require('../components/sidebar_sous_site.php'); ?>
    <div class="ml-96 pl-36">
        <div class="w-52 h-52">
            <img class="w-full h-full" src="../images/logo-BDC.png" alt="Logo BDC">
            <h2>Titre de la page</h2>
        
    <div class="p-4 sm:ml-64">
        <section id="creerPage">
            <div class="w-72 bg-white border border-gray-200 rounded-lg shadow p-4 gap-5">
            <table>

    
<?php  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <tr>
            <td><a href="../admin/modifPage.php?page_id=' . $row["id"] . '" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">' . htmlspecialchars($row["title"]) . '</a></td>
            <td><a href="suppression.php?id=' . $row["id"] . '" class="text-red-500" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette page ?\');">Supprimer</a></td>
            <td><a href="../admin/modifPage.php?page_id=' . $row["id"] . '" class="text-green-500" onclick="return confirm">Modifier</a></td>
        </tr>';
    }
} else {
    echo "Aucune page trouvée.";
}
?>


</table>
                <p>Contenu de la page</p>
            </div>
        </section>
    </div>
    </div>
    </div>



    <?php require('../components/injectionsScript.php') ?>
</body>

