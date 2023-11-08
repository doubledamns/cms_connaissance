<?php
session_start();

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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connexion'])) {
    // Récupérer les données du formulaire
    $user_email = $conn->real_escape_string($_POST['username']);
    $user_password = $conn->real_escape_string($_POST['password']);

    // Requête pour récupérer les informations de l'utilisateur
    $stmt = $conn->prepare("SELECT id, username, passwd, isAdmin FROM user WHERE username = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // L'utilisateur existe, vérifier le mot de passe
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe - Assurez-vous d'utiliser le hachage de mot de passe dans votre application réelle!
        if ($user_password === $user['passwd']) {
            // Succès, initialiser la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['isAdmin'] = $user['isAdmin'];

            // Rediriger vers la page d'administration
            header("Location: dashboard.php");
            exit();
        } else {
            // Échec, mauvais mot de passe
            echo "Mot de passe incorrect.";
        }
    } else {
        // Échec, utilisateur non trouvé
        echo "Aucun utilisateur trouvé avec cet email.";
    }

    $stmt->close();
}

$conn->close();
?>
