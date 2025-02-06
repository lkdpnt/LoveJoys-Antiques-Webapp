<?php
require 'config.php'; // Database connection
require 'mailer.php'; // PHPMailer or similar library for sending emails

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];

    // Check if email exists in your database
    // ...

    // Generate a unique token - this will be part of the reset link
    $token = bin2hex(random_bytes(50));

    // Store the token in your database with an expiration time
    // ...

    // Create a password reset link
    $resetLink = "http://superintendent-labo.000webhostapp.com/reset-password.php?email=$email&token=$token";

    // Send the email
    $subject = "Password Reset Request";
    $body = "Please click on the following link to reset your password: " . $resetLink;
    sendEmail($email, $subject, $body); // `sendEmail` is a function you'll define in 'mailer.php'

    // Inform the user to check their email
    echo "A password reset link has been sent to your email.";
}