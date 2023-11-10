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


// Ajoutez ce code au début de votre fichier auth.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Inscription'])) {
    $email = $conn->real_escape_string($_POST['mail']);
    $password = $conn->real_escape_string($_POST['mdp']);
    $confirm_password = $conn->real_escape_string($_POST['mdp2']);

    if ($password != $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Vérifier si l'email est déjà utilisé
    $stmt = $conn->prepare("SELECT id FROM user WHERE username = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "Un utilisateur existe déjà avec cet email.";
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Hasher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insérer le nouvel utilisateur
    $stmt = $conn->prepare("INSERT INTO user (username, passwd, isAdmin) VALUES (?, ?, 0)");
    $stmt->bind_param("ss", $email, $hashed_password);
    if ($stmt->execute()) {
        header("Location: ../user/dashboard.php");
    } else {
        echo "Erreur lors de l'inscription.";
    }
    $stmt->close();
}

// Traitement de la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'connexion') {
    $user_email = $conn->real_escape_string($_POST['username']);
    $user_password = $conn->real_escape_string($_POST['password']);

    // Requête pour récupérer les informations de l'utilisateur
    $stmt = $conn->prepare("SELECT id, username, passwd FROM user WHERE username = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe avec password_verify
        if (password_verify($user_password, $user['passwd'])) {
            // Succès, initialiser la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Rediriger vers la page du tableau de bord de l'utilisateur
            
            header("Location: ../user/dashboard.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }

    $stmt->close();
}

$conn->close();
?>

