<?php
// Include database connection
include('db_connection.php');

// Start session to ensure the user is logged in
session_start();

// Check if the user is logged in (assuming session variable `user_id` stores the user's ID)
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your order history.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch order history from the database for the logged-in user
$query = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
        }
        a:hover {
            color: #333;
        }
        .no-orders {
            text-align: center;
            font-size: 18px;
            color: #f44336;
        }
        .order-table {
            margin: 0 auto;
            width: 90%;
            max-width: 1200px;
        }
    </style>
</head>
<body>

<?php
if (mysqli_num_rows($result) > 0) {
    // Display order history in a table
    echo "<h1>Your Order History</h1>";
    echo "<table class='order-table'>";
    echo "<tr><th>Order ID</th><th>Order Date</th><th>Total Price</th><th>Status</th><th>Action</th></tr>";
    
    while ($order = mysqli_fetch_assoc($result)) {
        $order_id = $order['order_id'];
        $order_date = $order['order_date'];
        $total_price = $order['total_price'];
        $status = $order['status'];

        echo "<tr>";
        echo "<td>$order_id</td>";
        echo "<td>$order_date</td>";
        echo "<td>$$total_price</td>";
        echo "<td>$status</td>";
        echo "<td><a href='order_details.php?id=$order_id'>View Details</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<p class='no-orders'>You have no past orders.</p>";
}
?>

</body>
</html>
