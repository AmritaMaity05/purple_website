<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'ecommerce'); // Change database name if necessary

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Authorization check (optional)
if (!isset($_SESSION['admin'])) {
    header("Location: login.php?error=Unauthorized access.");
    exit();
}

// Handle deleting a product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $productId = $conn->real_escape_string($_POST['product_id']);

    // Fetch the product details (including image) to delete it from the server
    $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        // Product exists, delete the image file
        $imagePath = 'uploads/' . $row['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }

        // Delete the product from the database
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();

        // Check if the product was deleted
        if ($stmt->affected_rows > 0) {
            header("Location: admin_dashboard.php?success=Product deleted successfully!");
        } else {
            header("Location: admin_dashboard.php?error=Failed to delete product.");
        }
        $stmt->close();
    } else {
        // If the product doesn't exist
        header("Location: admin_dashboard.php?error=Product not found.");
    }
    exit();
}

header("Location: admin_dashboard.php?error=Failed to delete product.");
exit();
