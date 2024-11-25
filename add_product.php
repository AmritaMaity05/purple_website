<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'login_register');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle adding a product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['product_image'])) {
    $productName = $conn->real_escape_string($_POST['product_name']);
    $productPrice = $_POST['product_price'];
    $productImage = $_FILES['product_image'];

    // Validate product price to ensure it's a valid number
    if (!is_numeric($productPrice)) {
        header("Location: admin_dashboard.php?error=Invalid product price.");
        exit();
    }

    // Validate file type and size
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if (in_array($productImage['type'], $allowedTypes) && $productImage['size'] <= $maxSize) {
        $imageName = time() . '_' . basename($productImage['name']);
        $targetDir = 'uploads/';
        $targetFile = $targetDir . $imageName;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
        }

        if (move_uploaded_file($productImage['tmp_name'], $targetFile)) {
            // Insert product into the database
            $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $productName, $productPrice, $imageName);
            
            if ($stmt->execute()) {
                header("Location: admin_dashboard.php?success=Product added successfully!");
            } else {
                header("Location: admin_dashboard.php?error=Failed to add product to the database.");
            }
            $stmt->close();
            exit();
        } else {
            header("Location: admin_dashboard.php?error=Failed to upload image.");
            exit();
        }
    } else {
        header("Location: admin_dashboard.php?error=Invalid file type or size.");
        exit();
    }
}

header("Location: admin_dashboard.php");
exit();
?>
