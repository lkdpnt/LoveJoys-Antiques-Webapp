<?php
session_start();

require 'config.php'; // Database configuration

$login_error = ''; // Variable to store login error message

// Check if the data from the login form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign and sanitize form values
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Prepare SQL to prevent SQL injection
    if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE email = ?')) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        
        // Store the result to check if the account exists
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();
            
            // Account exists, now verify the password
            if (password_verify($password, $hashed_password)) {
                // Verification success! User has logged-in
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $email;
                $_SESSION['id'] = $id;
                
                // Redirect to user dashboard page
                header('Location: dashboard.php');
                exit();
            } else {
                // Incorrect password
                $login_error = 'Incorrect password!';
            }
        } else {
            // Incorrect email
            $login_error = 'Incorrect email!';
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <?php if ($login_error != ''): ?>
            <p class="error-message"><?php echo $login_error; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
                <!-- Forgot Password Link -->
                <p><a href="forgot-password.php">Forgot Password?</a></p>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
        <p class="signup-link">Don't have an account? <a href="index.php">Sign up</a></p> <!-- Link to the sign-up page -->
    </div>
</body>
</html>


