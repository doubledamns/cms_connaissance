

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

$title = 'dk';
$content = "kdd";
$files = "tr";


try{
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $sth = $dbco->prepare("INSERT INTO page (title,content,img) VALUES (:title, :content, :img)");
                $sth->execute(array(
                                    ':title' => $title,
                                    ':content' => $content,
                                    ':img' => $files,
                                    ));
    $dbco->exec($sql);
    echo 'Entrée ajoutée dans la table';
}catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
























/*
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";


$imgContent = "";
$



try {
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérifiez si le fichier a été téléchargé
    if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
        
        // Récupérez le contenu du fichier et encodez-le en base64
        //$imageContent = base64_encode(file__contents($_FILES['fileToUpload']['tmp_name']));
        
        // Démarrez la transaction
        $dbco->beginTransaction();
        
        // Préparez la requête SQL
        $stmt = $dbco->prepare("INSERT INTO page (title, content, img) VALUES ($title, $content, $imgContent)");
        
        // Liez les paramètres et exécutez la requête
        $stmt->execute([
        ]);
        
        // Validez la transaction
        $dbco->commit();
        
        echo 'Entrée ajoutée dans la table';
        
    } else {
        echo 'Erreur lors du téléchargement du fichier.';
    }
    
} catch(PDOException $e) {
    // Annulez la transaction si une erreur se produit
    $dbco->rollBack();
    echo "Erreur : " . $e->getMessage();
}
*/