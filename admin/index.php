<?php
ob_start();
require_once "../global.php";
require_once "../dao/pdo.php";
require_once "../dao/users.php";
require_once "../global.php";


// hearder
require_once "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        //home page
        case 'home':
            require_once "home.php";
            break;

        // product page
        case 'products':
            require_once "products/products_list.php";
            break;

        // users page
        case 'users':
            require_once "users/list.php";
            break;

        //add user page
        case "add-user":
            require_once "users/add_user.php";
            break;

        // edit user page
        case "edit_user":
            require_once "users/edit_user.php";
            break;
            

        // edit product
        case "edit_product":
            require_once "products/edit_product.php";
            break;
        // add product
        case "add-product":
            require_once "products/add_product.php";
            break;

        // loại sp
        case "categories":
            require_once "categories/categories.php";
            break;
        
        case "edit-category":
            require_once "categories/edit_category.php";
            break;
        
        case "add-category":
            require_once "categories/add_category.php";
            break;

        // Đơn hàng
        case "orders":
            require_once "orders/orders.php";
            break;
        case "order-detail":
            require_once "orders/order_detail.php";
            break;
        
        default:
            require_once "home.php";
            break;
    }

} else {
    require_once "home.php";
}

// footer
require_once "footer.php";
ob_end_flush();
?>

<!-- JS here -->
<script src="../site/assets/js/vendor/jquery.js"></script>
    <script src="../site/assets/js/vendor/waypoints.js"></script>
    <script src="../site/assets/js/bootstrap-bundle.js"></script>
    <script src="../site/assets/js/meanmenu.js"></script>
    <script src="../site/assets/js/swiper-bundle.js"></script>
    <script src="../site/assets/js/slick.js"></script>
    <script src="../site/assets/js/range-slider.js"></script>
    <script src="../site/assets/js/magnific-popup.js"></script>
    <script src="../site/assets/js/nice-select.js"></script>
    <script src="../site/assets/js/purecounter.js"></script>
    <script src="../site/assets/js/countdown.js"></script>
    <script src="../site/assets/js/wow.js"></script>
    <script src="../site/assets/js/isotope-pkgd.js"></script>
    <script src="../site/assets/js/imagesloaded-pkgd.js"></script>
    <script src="../site/assets/js/ajax-form.js"></script>
    <script src="../site/assets/js/main.js"></script>