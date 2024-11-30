<?php
require_once "../dao/cart.php";
require_once "../dao/product_variants.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    // add to cart
    if (isset($_SESSION['user'])) {
        $variant_id = add_variant($product_id, $size, $color);
        add_cart($_SESSION['user']['user_id'], $variant_id, $quantity);
        $count_cart = count_cart_user($_SESSION['user']['user_id']);
        echo $count_cart['total'];
    }
}




?>