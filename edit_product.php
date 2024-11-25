<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'login_register');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product details if ID is provided
if (isset($_GET['id'])) {
    $productId = $conn->real_escape_string($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the product is found
    if ($row = $result->fetch_assoc()) {
        $productName = $row['name'];
        $productPrice = $row['price'];
        $productImage = $row['image'];
    } else {
        header("Location: admin_dashboard.php?error=Product not found.");
        exit();
    }
    $stmt->close();
} else {
    header("Location: admin_dashboard.php?error=Product ID is missing.");
    exit();
}

// Handle form submission for updating the product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updatedProductName = $conn->real_escape_string($_POST['product_name']);
    $updatedProductPrice = $conn->real_escape_string($_POST['product_price']);
    $updatedProductImage = $_FILES['product_image'];

    // Check if image is uploaded
    if (!empty($updatedProductImage['name'])) {
        // Validate new image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $maxSize = 2 * 1024 * 1024; // 2MB

        if (in_array($updatedProductImage['type'], $allowedTypes) && $updatedProductImage['size'] <= $maxSize) {
            $imageName = time() . '_' . basename($updatedProductImage['name']);
            $targetDir = 'uploads/';
            $targetFile = $targetDir . $imageName;

            // Delete the old image
            $oldImagePath = 'uploads/' . $productImage;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload the new image
            if (move_uploaded_file($updatedProductImage['tmp_name'], $targetFile)) {
                $productImage = $imageName;
            } else {
                $error = "Failed to upload new image.";
            }
        } else {
            $error = "Invalid file type or size.";
        }
    }

    // Update product in the database
    if (!isset($error)) {
        $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, image = ? WHERE id = ?");
        $stmt->bind_param("sssi", $updatedProductName, $updatedProductPrice, $productImage, $productId);
        if ($stmt->execute()) {
            header("Location: admin_dashboard.php?success=Product updated successfully!");
            exit();
        } else {
            $error = "Failed to update product.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        img {
            border-radius: 5px;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>

        <!-- Display error message if any -->
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <!-- Edit Product Form -->
        <form action="edit_product.php?id=<?php echo $productId; ?>" method="POST" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" value="<?php echo htmlspecialchars($productName); ?>" required>
            <br>

            <label for="product_price">Product Price:</label>
            <input type="text" name="product_price" value="<?php echo htmlspecialchars($productPrice); ?>" required>
            <br>

            <label for="product_image">Product Image (optional):</label>
            <input type="file" name="product_image">
            <br>

            <img src="uploads/<?php echo htmlspecialchars($productImage); ?>" alt="Product Image" width="100">
            <br><br>

            <button type="submit">Update Product</button>
        </form>
    </div>
</body>
</html>
