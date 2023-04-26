<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
    <h2>Registration</h2>
    <form method="post" action="register.php">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="register">Register</button>
    </form>
    <br>
    <a href="index.php">Back to Login</a>
</body>
</html>

<?php
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']); // Hash the password with SHA-256 algorithm

    // Store the credentials in a file named "users.txt"
    file_put_contents('users.txt', $username . ':' . $password . "\n", FILE_APPEND | LOCK_EX);

    echo '<p>Registration Successful!</p>';
}
?>
