<?php 
include 'register.php'; 

ini_set('display_errors', 1);
error_reporting(E_ALL);


$signup_success = isset($_GET['signup']) && $_GET['signup'] == 'success';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lovejoy's Antiques</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <style>
    #logo {
        width: 200px; /* Adjust as needed */
        height: auto;
        }
        </style>
        <img src="logo.png" alt="Lovejoy's Antiques Logo" id="logo">
    </header>
    <div class="form-container">
        <?php if ($signup_success): ?>
            <p class="success-message">Registration successful! You can now log in.</p>
        <?php endif; ?>
    <div>
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action= "register.php" method="post">
            <div>
                <label>username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span><?php echo $username_err; ?></span>
            </div>
            <div>
                <label>password</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message"><?php echo $password_err; ?></span> <!-- Display the password error message-->
            </div>
            <div>
                <label>email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
                <span><?php echo $email_err; ?></span>
            </div>
            <div>
                <label>number</label>
                <input type="text" name="number" value="<?php echo $number; ?>">
                <span><?php echo $number_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
        <p class="login-link">Already registered? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
