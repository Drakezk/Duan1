<?php
ob_start();
require_once "../global.php";
require_once "../dao/users.php";
require_once "../dao/products.php";
require_once "../dao/images.php";
require_once "../dao/categories.php";
require_once "../dao/cart.php";
require_once "../dao/product_variants.php";
require_once "../dao/comments.php";
require_once "../dao/order.php";
require_once "../dao/wishlist.php";
require_once "../dao/order_carts.php";
require_once "../dao/contacts.php";

?>
<!DOCTYPE html>
<html >

<!-- Mirrored from weblearnbd.net/tphtml/shofy-prv/shofy/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jul 2023 07:58:08 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shofy - Multipurpose eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="assets/css/flaticon_shofy.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php

    require_once "topbar.php";
    require_once "header.php";
    
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            // login page
            case "login":
                require_once "login.php";
                break;

            // profile page
            case "profile":
                require_once "profile/profile.php";
                break;

            //register page
            case "register":
                require_once "register.php";
                break;

            //order page
            case "order";
                require_once "order.php";
                break;
            // product page
            case "products":
                require_once "shop.php";
                break;

            // product details page
            case "product-details";
                require_once "product-details.php";
                break;

            // cart page
            case "cart":
                require_once "cart.php";
                break;

            // wishlist page
            case "wishlist":
                require_once "wishlist.php";
                break;

            // checkout
            case "checkout":
                require_once "checkout.php";
                break;


            // contact
            case "contact":
                require_once "contact.php";
                break;
            // about 
            case "about":
                require_once "about.php";
                break;
            // 404
            case "404":
                require_once "404.php";
                break;

            default:
                require_once "home.php";
                break;
        }
    }else{
        require_once "home.php";
    }

    //   footer area start
    require_once "footer.php";
    ob_end_flush();
    ?>

    <!-- JS here -->
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/waypoints.js"></script>
    <script src="assets/js/bootstrap-bundle.js"></script>
    <script src="assets/js/meanmenu.js"></script>
    <script src="assets/js/swiper-bundle.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/range-slider.js"></script>
    <script src="assets/js/magnific-popup.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/purecounter.js"></script>
    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/isotope-pkgd.js"></script>
    <script src="assets/js/imagesloaded-pkgd.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>