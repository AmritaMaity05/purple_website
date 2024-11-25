<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Check if items are in the cart (assuming a cart is stored in session)
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Redirect to the home page or cart page if no items in cart
    header('Location: index.php');
    exit();
}

// Placeholder for cart details
$cart_items = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirm Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
</head>
<body>

<div class="container">
    <h2>Confirm Your Booking</h2>

    <h3>Hello, <?php echo $_SESSION['username']; ?>! You are about to confirm your booking.</h3>

    <h4>Items in your cart:</h4>
    <ul>
        <?php
        foreach ($cart_items as $item) {
            echo "<li>" . $item['name'] . " - " . $item['quantity'] . " x $" . $item['price'] . "</li>";
        }
        ?>
    </ul>

    <h4>Total: $<?php echo array_sum(array_column($cart_items, 'price')); ?></h4>

    <form method="POST" action="process_booking.php">
        <button type="submit" class="btn btn-primary">Confirm Booking</button>
    </form>
</div>

</body>
</html>
