<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <?php require('../components/sidebar.php') ?>

    <div class="p-4 sm:ml-64">
        <section id="titleSite">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left">Changer le nom du site</h2>
            <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                <label for="nom-site" class="block text-sm font-medium leading-6 text-gray-900">Nom du site</label>
                <div class="mt-2">
                    <input placeholder="Nom du site" type="text" name="nom-site" id="nom-site" autocomplete="given-name" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6">
                </div>

            </div>
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <a href="./dashboard.php"><button class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Annuler</button></a>
                <button type="submit" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Sauvegarder</button>
            </div>
        </section>
    </div>

    <?php require('../components/injectionsScript.php') ?>

    <?php
    // Récupérez le nouveau nom du site depuis le formulaire
    $nomDuSite = $_POST['nom-site'];

    // Établissez une connexion à la base de données (assurez-vous de configurer vos paramètres de connexion)
    $servername = "votre_hôte";
    $username = "votre_nom_utilisateur";
    $password = "votre_mot_de_passe";
    $dbname = "votre_base_de_données";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparez et exécutez la requête d'insertion
    $sql = "INSERT INTO noms_sites (nom) VALUES ('$nomDuSite')";

    if ($conn->query($sql) === TRUE) {
        echo "Le nom du site a été enregistré avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'enregistrement du nom du site : " . $conn->error;
    }

    // Fermez la connexion à la base de données
    $conn->close();
    ?>

</body>

</html>