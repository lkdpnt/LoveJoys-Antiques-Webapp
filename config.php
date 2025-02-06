<?php
$servername = "localhost"; // Actual database host
$db_username = "id21697546_ltd20"; // Database username
$db_password = "Cat121212!"; // Database password
$dbname = "id21697546_usersdb"; // Database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
