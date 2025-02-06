<?php
require 'config.php'; // Database connection

$error = "";
$success = "";
$email = "";
$token = "";

// Check if email and token are set in the URL
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    // Validate token and email here
    // ...

} else {
    $error = "Invalid password reset link.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password and confirm password
    // ...

    if ($error == "") {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        // ...

        $success = "Your password has been reset successfully.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <?php if($error != ""): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if($success != ""): ?>
            <p class="success-message"><?php echo $success; ?></p>
        <?php else: ?>
            <form action="" method="post">
                <div>
                    <label>New Password</label>
                    <input type="password" name="new_password" required>
                </div>
                <div>
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" required>
                </div>
                <div>
                    <input type="submit" value="Reset Password">
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
