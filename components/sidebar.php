<?php


// Connexion à la base de données
$servername = "127.0.0.1";
$username = "root"; // Remplacez par votre nom d'utilisateur de base de données
$password = ""; // Remplacez par votre mot de passe de base de données
$dbname = "cms_bdd";


// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Gérer le cas où l'utilisateur n'est pas connecté
    header("Location: chemin/vers/page-de-connexion.php");
    exit();
}

$userId = $_SESSION['user_id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Modifier la requête pour filtrer par id_user
    $stmt = $conn->prepare("SELECT nom FROM noms_sites WHERE id_user = :userId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
$query = "SELECT id, nom, url FROM noms_sites WHERE id_user = '$userId'";
$result = $conn->query($query);


$conn = null;


?>


<button href="./" data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-900 bg-purple-300 rounded-lg sm:hidden hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-puple-100">
    <span class="sr-only">Ouvrir la navigation</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>




<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto bg-purple-200 ">
        <!-- Contenu principal de la barre latérale -->
        <div>
            <div class="flex flex-col justify-center w-full h-20 mb-6">
                <img class="w-20 h-full self-center" src="../images/logo-BDC.png" alt="Logo BDC" />
                <h1 class="text-xl font-semibold text-center">CMS Connaissance</h1>
            </div>
            <ul class="space-y-2 font-medium">
            <li>
                <a href="../user/moncompte.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ml-3">Mon compte</span>
                </a>
            </li>
            <li>
                <a href="../user/dashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
                            <li>
                                <a href="../user/site.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Site</span>
                                </a>

                                <ul class="space-y-2 font-medium">
                                <?php foreach ($result as $row): ?>
                                    <li class="affichage">
                                        <a href="set_site.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                            <!-- Icône ou autre élément visuel ici -->
                                            <span class="ml-3"><?php echo htmlspecialchars($row['nom']); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>                        
                        <li>
                            <a href="../user/CreeUnSite.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <!-- Icône ou autre élément visuel ici -->
                                <span class="ml-3">Créé un site</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) : ?>
                    <a href="../admin/gestionUser.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Gestion utilisateur</span>
                </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Menu de déconnexion fixé en bas -->
        <div>
            <ul class="space-y-2 font-medium">
            <li>
                <a href="../connexion/logout.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Deconnexion</span>
                </a>
            </li>
            </ul>
        </div>
    </div>
</aside>




