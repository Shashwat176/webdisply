<!DOCTYPE html>
<html>
<head>
    <title>Access Denied</title>
</head>
<body>
    <h2>Access Denied</h2>
    <p>You are not authorized to access this page. Please <a href="index.php">login</a> first.</p>
</body>
</html>

<?php
session_start(); // Start the session
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']); // Hash the password with SHA-256 algorithm

    $users = file('users.txt'); // Read the list of users from the file
    foreach($users as $user) {
        $credentials = explode(':', $user);
        if(trim($credentials[0]) === $username && trim($credentials[1]) === $password) {
            // User authenticated successfully, store the session variable
            $_SESSION['username'] = $username;
            header('Location: content.php'); // Redirect to the protected page
            exit();
        }
    }
    echo '<p>Login failed. Invalid username or password.</p>';
}
?>
