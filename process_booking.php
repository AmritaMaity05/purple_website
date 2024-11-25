<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Check if the cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Save the order to the database (example)
    $user_id = $_SESSION['user_id'];
    $cart_items = $_SESSION['cart'];

    // You should process the cart and insert it into the database as an order here
    // Example: Save order in 'orders' table in your database
    // You can loop through $cart_items and insert each item into the orders table

    // After processing, clear the cart
    unset($_SESSION['cart']);

    // Redirect to a confirmation page or thank-you page
    header('Location: thank_you.php');
    exit();
} else {
    // If no items in the cart, redirect to home page
    header('Location: index.php');
    exit();
}
?>
