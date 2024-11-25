<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$username = $_SESSION['username']; // Retrieve the username from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <p>You are logged in.</p>
    <p><a href="logout.php">Logout</a></p> <!-- Link to logout page -->
</body>
</html>
