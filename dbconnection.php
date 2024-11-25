<?php

// Database connection details
$hostName = "localhost";
$dbUser = "root";
$dbPassword = ""; // Typically empty in XAMPP
$dbName = "ecommerce"; // Use the correct database name

// Create the database connection
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Check if the connection is successful
if (!$conn) {
    // Log the error in a file for later debugging
    error_log("Connection failed: " . mysqli_connect_error(), 3, "db_error_log.txt");
    die("Connection failed: Please try again later.");
}

?>