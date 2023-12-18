
    <!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php');
 ?>
    <!-- Assurez-vous d'inclure le lien vers Tailwind CSS ici si ce n'est pas déjà fait -->

</head>

<body>
    <?php require('../components/sidebar.php'); ?>

    <!-- Le contenu principal de la page -->
    <div class="m-10">
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr class="border border-gray-300 md:border-none block md:table-row">
                    <th class="bg-gray-100 p-2 text-gray-700 block md:table-cell">Nom d'utilisateur</th>
                    <th class="bg-gray-100 p-2 text-gray-700 block md:table-cell">Email</th>
                    <!-- Ajoutez ici d'autres entêtes de colonnes si nécessaire -->
                    <th class="bg-gray-100 p-2 text-gray-700 block md:table-cell">Admin</th>
                    <th>
                        <a  class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-purple-300 rounded-lg hover:bg-purple-200 focus:ring-4 focus:outline-none focus:ring-purple-200">
                                    Ajouter
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
            <?php
                    // Connexion à la base de données
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "cms_bdd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

                $sql = "SELECT id, username, passwd, isAdmin FROM user";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='bg-white border border-gray-300 md:border-none block md:table-row'>";
                        echo "<td class='p-2 block md:table-cell'>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td class='p-2 block md:table-cell'>" . htmlspecialchars($row['passwd']) . "</td>";
                        echo "<td class='p-2 block md:table-cell'>" . ($row['isAdmin'] ? 'Oui' : 'Non') . "</td>";
                        echo "<td class='p-2 block md:table-cell'>";
                        echo "<a href='edit_user.php?id=" . $row['id'] . "' class='text-white bg-blue-500 hover:bg-blue-700 rounded p-2'>Éditer</a> ";
                        echo "<a href='delete_user.php?id=" . $row['id'] . "' class='text-white bg-red-500 hover:bg-red-700 rounded p-2'>Supprimer</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='p-2 block md:table-cell text-center'>Aucun utilisateur trouvé</td></tr>";
                }       

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>