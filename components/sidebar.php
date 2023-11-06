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





<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-900 bg-purple-300 rounded-lg sm:hidden hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-puple-100">
    <span class="sr-only">Ouvrir la navigation</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-purple-200 ">
        <div class="flex flex-col justify-center w-full h-20 mb-6">
            <img class="w-20 h-full self-center" src="/images/logo-BDC.png" alt="Logo BDC"/>
            <h1 class="text-xl font-semibold text-center"><?php echo $nomDuSite;?></h1>
        </div>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="./" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./creerPage.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 128 128">
                        <path d="M 64 6.0507812 C 49.15 6.0507812 34.3 11.7 23 23 C 0.4 45.6 0.4 82.4 23 105 C 34.3 116.3 49.2 122 64 122 C 78.8 122 93.7 116.3 105 105 C 127.6 82.4 127.6 45.6 105 23 C 93.7 11.7 78.85 6.0507812 64 6.0507812 z M 64 12 C 77.3 12 90.600781 17.099219 100.80078 27.199219 C 121.00078 47.499219 121.00078 80.500781 100.80078 100.80078 C 80.500781 121.10078 47.500781 121.10078 27.300781 100.80078 C 7.0007813 80.500781 6.9992188 47.499219 27.199219 27.199219 C 37.399219 17.099219 50.7 12 64 12 z M 64 42 C 62.3 42 61 43.3 61 45 L 61 61 L 45 61 C 43.3 61 42 62.3 42 64 C 42 65.7 43.3 67 45 67 L 61 67 L 61 83 C 61 84.7 62.3 86 64 86 C 65.7 86 67 84.7 67 83 L 67 67 L 83 67 C 84.7 67 86 65.7 86 64 C 86 62.3 84.7 61 83 61 L 67 61 L 67 45 C 67 43.3 65.7 42 64 42 z"></path>
                    </svg>
                    <span class="ml-3">Créer une page</span>
                </a>
            </li>
            <li>
                <a href="./logoSite.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Logo du site</span>
                </a>
            </li>
            <li>
                <a href="./menuSite.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Menu du site</span>
                </a>
            </li>
            <li>
                <a href="./titreSite.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Nom du site</span>
                </a>
            </li>
            <li>
                <a href="./reseauxsociaux.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Réseaux sociaux</span>
                </a>
            </li>
            <li>
                <a href="./login.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Page login</span>
                </a>
            </li>
            
                <?php if ($result->num_rows > 0) {
                                                                    while($row = $result->fetch_assoc()) {
                                                                        echo '
                                                                        <li><a href="../admin/modifPage.php?page_id=' . $row["id"] . '" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">' . htmlspecialchars($row["title"]) . '</a></li>';
                                                                    }
                                                                } else {
                                                                    echo "Aucune page trouvée.";
                                                                }
                                                                $stmt->close(); // Fermeture de la deuxième requête préparée

                                                                // Fermeture de la connexion
                                                                $conn->close();?>
                                                                
            
        </ul>
    </div>
</aside>
