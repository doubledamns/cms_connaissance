<?php
// Database connection parameters
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "cms_bdd";

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cms_bdd";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume we get the page ID from the URL or some other method
$page_id = $_GET['page_id'] ?? null;

// Initialize variables
$title = '';
$content = '';
$imagePath = '';

// Get the page data from the database if we're editing
if ($page_id && $stmt = $conn->prepare("SELECT title, content, img FROM page WHERE id=?")) {
    $stmt->bind_param("i", $page_id);
    $stmt->execute();
    $stmt->bind_result($title, $content, $imagePath);
    $stmt->fetch();
    $stmt->close();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $content = $_POST["content"];
    $page_id = $_POST["page_id"] ?? null;

    // Check and process the uploaded file
    if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (in_array($_FILES["img"]["type"], $allowed_types)) {
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            } else {
                echo "There was an error uploading your file.";
            }
        } else {
            echo "Error: Only JPG, PNG, and GIF files are allowed.";
        }
    }

    // Check if we're updating an existing page or creating a new one
    if ($page_id) {
        // Prepare the SQL query for update
        if ($stmt = $conn->prepare("UPDATE page SET title=?, content=?, img=? WHERE id=?")) {
            $stmt->bind_param("sssi", $title, $content, $imagePath, $page_id);
        }
    } else {
        // Prepare the SQL query for insertion
        if ($stmt = $conn->prepare("INSERT INTO page (title, content, img) VALUES (?, ?, ?)")) {
            $stmt->bind_param("sss", $title, $content, $imagePath);
        }
    }

    // Execute the SQL query
    if ($stmt->execute()) {
        echo "Page updated successfully.";
        // Redirection
        header("Location: modifPage.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php') ?>
</head>

<body>
    <?php require('../components/sidebar.php') ?>

    <div class="p-4 sm:ml-64">
        <section id="creerPage">
            <h2 class="pb-12 text-4xl font-semibold text-center md:text-left"><?php echo $page_id ? 'Modifier' : 'Créer'; ?> une page</h2>
            <form id="createForm" method="post" action="../submit.php" enctype="multipart/form-data">
                <input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
                <div class="space-y-6">
                    <div class="sm:col-span-3 shadow-lg p-4 rounded-lg w-fit">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Titre de la page</label>
                        <div class="mt-2">
                            <input value="<?php echo $title; ?>" placeholder="Titre de la page" type="text" name="title" id="title" autocomplete="given-name" class="block w-56 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-300 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="shadow-lg p-4 rounded-lg w-fit">
                        <textarea id="content" name="content"><?php echo $content; ?></textarea>
                    </div>

                    <div class="col-span-full shadow-lg p-4 rounded-lg w-fit">
                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <!-- Your SVG code here -->
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="img">Choose a file:</label>
                                    <input type="file" id="img" name="img">
                                    <p class="pl-1">ou fais la glisser</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF jusqu'à 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-start gap-x-6">
                    <a href="./dashboard.php"><button type="button" class="rounded-md bg-purple-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Annuler</button></a>
                    <button type="submit" class="rounded-md bg-purple-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-purple-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-200">Sauvegarder</button>
                </div>
            </form>     
        </section>
    </div>

    <?php require('../components/injectionsScript.php') ?>
    <!-- Script TinyMCE -->
    <script>
        tinymce.init({
            selector: 'textarea',
            // Other TinyMCE configuration options
        });
    </script>
</body>

</html>
