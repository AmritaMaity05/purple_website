<!DOCTYPE html>
<html lang="en">
<head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
</head>
<body>
    <div class="super_container">
        <!-- Navbar -->
        <?php include 'include/navbar.php'; ?>
        
        <div class="container single_product_container">
            <div class="row">
                <div class="col">
                    <!-- Breadcrumbs -->
                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="categories.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Product Images -->
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-3 thumbnails_col">
                                <div class="single_product_thumbnails">
                                    <ul>
                                        <li><img src="images/single_1_thumb.jpg" alt="Product Thumbnail 1"></li>
                                        <li><img src="images/single_2_thumb.jpg" alt="Product Thumbnail 2"></li>
                                        <li><img src="images/single_3_thumb.jpg" alt="Product Thumbnail 3"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col">
                                <div class="single_product_image">
                                    <div class="single_product_image_background" style="background-image:url(images/single_2.jpg)"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Details -->
                <div class="col-lg-5">
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>Pocket Cotton Sweatshirt</h2>
                            <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis...</p>
                        </div>
                        <div class="free_delivery d-flex flex-row align-items-center">
                            <span class="ti-truck"></span><span>Free Delivery</span>
                        </div>
                        <div class="original_price">$629.99</div>
                        <div class="product_price">$495.00</div>
                        <ul class="star_rating">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        </ul>
                        <div class="product_color">
                            <span>Select Color:</span>
                            <ul>
                                <li style="background: #e54e5d"></li>
                                <li style="background: #252525"></li>
                                <li style="background: #60b3f3"></li>
                            </ul>
                        </div>
                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <span>Quantity:</span>
                            <div class="quantity_selector">
                                <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                <span id="quantity_value">1</span>
                                <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include 'include/footer.php'; ?>
    </div>
    <!-- JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="js/single_custom.js"></script>
</body>
</html>
