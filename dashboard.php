<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// You can retrieve user information from the database if needed
// $userid = $_SESSION['id'];
// Retrieve user data from database based on $userid

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($_SESSION['name']); ?></h1>
        <p>This is your dashboard where you can view your activity, request evaluations, and more.</p>
        
        <!-- Dashboard Navigation Links -->
        <ul>
            <li><a href="request_evaluation.php">Request Evaluation</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <!-- Additional dashboard features and information here -->

    </div>
</body>
</html>
