<!DOCTYPE html>
<html>
<head>
    <title>Protected Page</title>
</head>
<body>
    <h2>Welcome to the Protected Page</h2>
    <p>You have successfully logged in as <?php echo $_SESSION['username']; ?>.</p>
</body>
</html>

<?php
session_start(); // Start the session
if(!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to the login page if user is not authenticated
}
?>
