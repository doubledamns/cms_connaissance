<?php
// loadPage.php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$pageId = $_GET['pageId'];

$stmt = $conn->prepare("SELECT title, img, content FROM page WHERE id = :pageId");
$stmt->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$stmt->execute();

$page = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($page);
?>
