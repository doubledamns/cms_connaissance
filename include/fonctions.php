

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";
$conn = new mysqli($servername, $username, $password, $dbname);

<<<<<<< Updated upstream
function connectToBase(){

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "cms_bdd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);    
=======
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
>>>>>>> Stashed changes
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $content = $_POST["content"];
    

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO page (title, content, img) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $content, $target_file);
            
            
            if ($stmt->execute()) {
                echo "Nouvelle page créée avec succès.";
            } else {
                echo "Erreur: " . $stmt->error;
            }
            
            
            $stmt->close();
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    } else {
        echo "Erreur: Fichier non téléchargé ou autre erreur.";
    }
}
$conn->close();
?>








<<<<<<< Updated upstream
}?> 
=======
>>>>>>> Stashed changes
