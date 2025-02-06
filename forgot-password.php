<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>
        <form action="password-recovery.php" method="post">
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <input type="submit" value="Reset Password">
            </div>
        </form>
    </div>
</body>
</html>
