   
   <?php
// Assurez-vous que la session est démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Paramètres de connexion à la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifiez si l'ID du site est défini dans la session
$siteId = $_SESSION['siteId'] ?? 1; // Utilisez une valeur par défaut si non défini

// Récupération des URLs des réseaux sociaux
$query = "SELECT Instagram, Facebook, Linkedin FROM noms_sites WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $siteId);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

$instagram = $result['Instagram'] ?? '#';
$facebook = $result['Facebook'] ?? '#';
$linkedin = $result['Linkedin'] ?? '#';

$conn->close();
?>

<style>
    .footer {
        background-color: #f2f2f2;
        text-align: center;
        padding: 20px 0;
    }
    .footer a {
        margin: 0 10px;
        text-decoration: none;
        color: #333;
    }
</style>

<footer class="footer">
    <p>© <?php echo date("Y"); ?> - <?php echo htmlspecialchars($nomDuSite); ?></p>
    <div>
        <a href="<?php echo htmlspecialchars($facebook); ?>" target="_blank">Facebook</a>
        <a href="<?php echo htmlspecialchars($linkedin); ?>" target="_blank">LinkedIn</a>
        <a href="<?php echo htmlspecialchars($instagram); ?>" target="_blank">Instagram</a>
        <!-- Ajoutez d'autres réseaux sociaux ici -->
    </div>
</footer>



