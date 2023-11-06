<!DOCTYPE html>
<html lang="en">
<?php
// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Établir la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

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
$stmt = $conn->prepare("SELECT id, title FROM page");

$stmt->execute();
$result = $stmt->get_result();
?>
<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>
    <div class="p-4 sm:ml-64">
        <section id="creerPage">
            <div class="w-72 bg-white border border-gray-200 rounded-lg shadow p-4 gap-5">
                <p class="">Mettre le nom de la page là</p>
                <p>Contenu de la page</p>
            </div>
        </section>
    </div>

<table>
<thead>
    <tr>
    <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                                                                        <th> href="../admin/modifPage.php?page_id=' . $row["id"] . '" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">' . htmlspecialchars($row["title"]) . '</th>';
                }
            } else {
                echo "Aucune page trouvée.";
            }
            $stmt->close(); // Fermeture de la deuxième requête préparée

            // Fermeture de la connexion
            $conn->close(); ?>
              </tr>
  </thead>
</table>


    <?php require('../components/injectionsScript.php') ?>
</body>

</html>