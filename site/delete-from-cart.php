<?php
session_start();
require "../dao/cart.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cart_id = $_POST['cart_id'];
}

if(isset($_GET["cart_id"])){
    $cart_id = $_GET['cart_id'];
}

if (isset($_SESSION['user'])) {
    delete_cart($cart_id);
    echo "successfully";
}

if(isset($_GET["cart_id"])){
    header("Location: index.php?act=cart");
}
die();
?>