    <?php
    // Database connection parameters
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

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $title = $_POST["title"];
        $content = $_POST["content"];
        
        // Initialize a variable for the image path
        $imagePath = '';

        // Check and process the uploaded file
        if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
            echo "1";
            $allowed_types = array("image/jpeg", "image/png", "image/gif");
            if (in_array($_FILES["img"]["type"], $allowed_types)) {
                $target_dir = "images/";echo "3";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);


                
                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    echo "2";
                    $imagePath = $target_file;
                    
                } else {
                    echo "There was an error uploading your file.";
                }
            } else {
                echo "Error: Only JPG, PNG, and GIF files are allowed.";
            }
        }

        echo"8";
        
        // Prepare the SQL query
        if ($stmt = $conn->prepare("INSERT INTO page (title, content, img) VALUES (?, ?, ?)")) {
            $stmt->bind_param("sss", $title, $content, $imagePath);
            
            // Execute the SQL query
            if ($stmt->execute()) {
                echo "New page created successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
            
            // Close the prepared statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
    ?>
