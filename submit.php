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
    
    // Prepare the SQL query
    if ($stmt = $conn->prepare("INSERT INTO page (title, content) VALUES (?, ?)")) {
        $stmt->bind_param("ss", $title, $content);
        
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
