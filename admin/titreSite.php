<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>

    <?php
    // Paramètres de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cms_bdd";




    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérification si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $nomSite = $_POST["nom-site"];

        // Préparation de la requête SQL pour mettre à jour le nom
        // Supposons qu'il n'y a qu'une seule entrée, ou que vous mettez à jour l'entrée avec l'id 1
        $stmt = $conn->prepare("UPDATE noms_sites SET nom = ? WHERE id = 1");
        $stmt->bind_param("s", $nomSite);

        // Exécution de la requête SQL
        if ($stmt->execute()) {
            echo "Nom du site mis à jour avec succès.";
        } else {
            echo "Erreur: " . $stmt->error;
        }

        // Fermeture de la requête préparée
        $stmt->close();
    } else {
        echo "Aucune donnée soumise";
    }

    // Fermeture de la connexion
    $conn->close();
    ?>

    <div class="p-4 sm:ml-64">
        <section id="titleSite">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Changer le nom du site</h2>
            <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                <label for="nom-site" class="block text-sm font-medium leading-6 text-gray-900">Nom du site</label>
                <form id="createForm" method="post" action="" enctype="multipart/form-data">
                    <div class="mt-2">
                        <input placeholder="Nom du site" type="text" name="nom-site" id="nom-site" autocomplete="given-name" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6" required>
                    </div>


            </div>
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <a href="./dashboard.php"><button class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Annuler</button></a>
                <button type="submit" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Sauvegarder</button>
            </div>
            </form>
        </section>


    </div>

    <?php require('../components/injectionsScript.php') ?>
</body>

</html>