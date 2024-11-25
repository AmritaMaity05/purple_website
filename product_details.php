<?php
// Include database connection
include('db_connection.php');

// Get the product_id from the URL and sanitize it
$product_id = mysqli_real_escape_string($conn, $_GET['id']);

// Fetch product details from the database using a prepared statement
$query = "SELECT * FROM products WHERE product_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $product_id); // "i" for integer
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);

if ($product) {
    // Display product details
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Product Details</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 80%;
                max-width: 1200px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
            h1 {
                color: #333;
                font-size: 28px;
                margin-bottom: 20px;
            }
            p {
                color: #555;
                font-size: 16px;
                margin: 10px 0;
            }
            .price {
                font-size: 20px;
                font-weight: bold;
                color: #28a745;
            }
            .product-image {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
                margin-top: 20px;
            }
            .error {
                color: red;
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body>

    <div class='container'>
        <h1>" . htmlspecialchars($product['product_name']) . "</h1>
        <p>" . nl2br(htmlspecialchars($product['product_description'])) . "</p>
        <p class='price'>Price: $" . htmlspecialchars($product['price']) . "</p>
        <img class='product-image' src='" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['product_name']) . "'>
    </div>

    </body>
    </html>
    ";
} else {
    // Display error if product is not found
    echo "<p class='error'>Product not found.</p>";
}
?>
