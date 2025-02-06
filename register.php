<?php
// Include the database config file
require_once 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


// Start session for error reporting
session_start();

// Initialize variables with empty values
$username = $password = $email = $number = "";
$username_err = $password_err = $email_err = $number_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
    }
    

   
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate number
    if (empty(trim($_POST["number"]))) {
        $number_err = "Please enter a contact number.";
    } else {
        $number = trim($_POST["number"]);
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($number_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email, number) VALUES (?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_username, $param_password, $param_email, $param_number);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_number = $number;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("Location: login.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>