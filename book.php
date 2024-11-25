<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="book">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        button {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        button.btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        button.btn-success {
            background-color: #28a745;
            color: #fff;
        }

        button.btn-success:hover {
            background-color: #218838;
        }

        /* Cart Section Styles */
        .cart-items-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }
        .cart-item {
            align-items: center;
            justify-content: space-between;
        }

        .order-summary {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #f8f9fa;
        }

        .order-summary h4 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .product-price, .total-price {
            font-size: 18px;
        }

        .total-price strong {
            color: #333;
        }

        /* Booking Section Styles */
        #booking1 {
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f8f9fa;
            padding: 20px;
        }

        form#bookingForm .form-group {
            margin-bottom: 15px;
        }

        form#bookingForm label {
            font-weight: bold;
        }

        form#bookingForm input,
        form#bookingForm textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        form#bookingForm textarea {
            resize: none;
        }

        form#bookingForm input:focus,
        form#bookingForm textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cart-items-container, .order-summary, #booking1 {
                padding: 10px;
            }

            button {
                font-size: 14px;
                padding: 8px 16px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header trans_300">
            <!-- Top Navigation -->
            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">free shipping on all orders </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">
                                    <li class="currency">
                                        <a href="#">usd <i class="fa fa-angle-down"></i></a>
                                        <ul class="currency_selection">
                                            <li><a href="#">cad</a></li>
                                            <li><a href="#">aud</a></li>
                                            <li><a href="#">eur</a></li>
                                            <li><a href="#">gbp</a></li>
                                        </ul>
                                    </li>
                                    <li class="language">
                                        <a href="#">English <i class="fa fa-angle-down"></i></a>
                                        <ul class="language_selection">
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Italian</a></li>
                                            <li><a href="#">German</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </li>
                                    <li class="account">
                                        <a href="#">My Account <i class="fa fa-angle-down"></i></a>
                                        <ul class="account_selection">
                                            <li><a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->
            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="#">Purple<span>Star</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="index.php">home</a></li>
                                    <li><a href="categories.php">shop</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li><a href="#">blog</a></li>
                                    <li><a href="contact.php">contact</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                    <li class="checkout">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="checkout_items" class="checkout_items">0</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="fs_menu_overlay"></div>

        <!-- Hamburger Menu -->
        <div class="hamburger_menu">
            <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
            <div class="hamburger_menu_content text-right">
                <ul class="menu_top_nav">
                    <li class="menu_item has-children"><a href="#">usd <i class="fa fa-angle-down"></i></a>
                        <ul class="menu_selection">
                            <li><a href="#">cad</a></li>
                            <li><a href="#">aud</a></li>
                            <li><a href="#">eur</a></li>
                            <li><a href="#">gbp</a></li>
                        </ul>
                    </li>
                    <li class="menu_item has-children"><a href="#">English <i class="fa fa-angle-down"></i></a>
                        <ul class="menu_selection">
                            <li><a href="#">French</a></li>
                            <li><a href="#">Italian</a></li>
                            <li><a href="#">German</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </li>
                    <li class="menu_item has-children"><a href="#">My Account <i class="fa fa-angle-down"></i></a>
                        <ul class="menu_selection">
                            <li><a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                        </ul>
                    </li>
                    <li class="menu_item"><a href="index.php">home</a></li>
                    <li class="menu_item"><a href="categories.php">shop</a></li>
                    <li class="menu_item"><a href="#">pages</a></li>
                    <li class="menu_item"><a href="#">blog</a></li>
                    <li class="menu_item"><a href="contact.php">contact</a></li>
                </ul>
            </div>
        </div>

        <!-- Booking Section -->
        <div id="booking1" class="container">
            <h2>Your Booking Details</h2>
            <div class="cart-items-container">
                <h3>Cart Items</h3>
                <div class="cart-item">
                    <span>Item Name</span>
                    <span>Price</span>
                    <span>Quantity</span>
                </div>
                <!-- Add cart items dynamically -->
                <div class="cart-item">
                    <span>Example Product</span>
                    <span>$50</span>
                    <span>1</span>
                </div>
            </div>

            <div class="order-summary">
                <h4>Order Summary</h4>
                <div class="product-price">
                    <p>Subtotal: <strong>$50</strong></p>
                </div>
                <div class="total-price">
                    <p>Total Price: <strong>$50</strong></p>
                </div>
                <button class="btn btn-primary">Confirm Booking</button>
            </div>
        </div>

        <!-- Booking Form Section -->
        <div id="bookingForm" class="container">
            <h2>Complete Your Booking</h2>
            <form action="confirm_booking.php" method="POST">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Shipping Address</label>
                    <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="payment">Payment Method</label>
                    <select class="form-control" id="payment" name="payment">
                        <option value="credit">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Book Now</button>
            </form>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="scripts/custom.js"></script>
</body>
</html>
