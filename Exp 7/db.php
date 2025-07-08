<?php
// db.php - Database Connection File

$host = "localhost";       // Database host (usually localhost)
$username = "root";        // Database username
$password = "";            // Database password
$database = "your_db_name"; // Replace with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully"; // Uncomment to test connection
?>
