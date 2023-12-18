<?php
session_start(); // Démarre la session

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

// Vérifiez si l'ID du site est défini dans la session
if (isset($_SESSION['siteId'])) {
    $siteId = $_SESSION['siteId'];
} else {
    // Gérez le cas où l'ID du site n'est pas défini
    header("Location: selectionner_site.php"); // Redirigez vers une page appropriée
    exit;
}

// Récupération du nom du site
$stmt = $conn->prepare('SELECT nom FROM noms_sites WHERE id = ?');
$stmt->bind_param("i", $siteId);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $nomDuSite = $row['nom'];
}
$stmt->close();

// Récupération des pages associées au site sélectionné
$stmt2 = $conn->prepare("SELECT id, title FROM page WHERE id_site = ?");
$stmt2->bind_param("i", $siteId);
$stmt2->execute();
$result2 = $stmt2->get_result();

require('../components/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Ici, insérez les éléments de tête supplémentaires ou les références de script/css -->
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>
    <?php require('../components/sidebar_sous_site.php'); ?>

    <div class="ml-96 pl-36">
        <div class="w-52 h-52">
            <img class="w-full h-full" src="../images/logo-BDC.png" alt="Logo BDC">
            <h2><?php echo htmlspecialchars($nomDuSite); ?></h2>
        </div>

        <div class="p-4 sm:ml-64">
            <section id="creerPage">
                <div class="w-72 bg-white border border-gray-200 rounded-lg shadow p-4 gap-5">
                    <table>
                        <?php  
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                echo '<tr>
                                    <td><a href="../admin/modifPage.php?page_id=' . $row["id"] . '" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">' . htmlspecialchars($row["title"]) . '</a></td>
                                    <td><a href="suppression.php?id=' . $row["id"] . '" class="text-red-500" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette page ?\');">Supprimer</a></td>
                                    <td><a href="../admin/modifPage.php?page_id=' . $row["id"] . '" class="text-green-500">Modifier</a></td>
                                </tr>';
                            }
                        } else {
                            echo "Aucune page trouvée pour ce site.";
                        }
                        ?>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <?php require('../components/injectionsScript.php'); ?>
</body>
</html>
