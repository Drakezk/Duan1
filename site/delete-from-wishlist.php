<?php
session_start();
require_once "../dao/wishlist.php";
$product_id = $_GET['product_id'];

if(isset($_SESSION['user'])){
    delete_wish($product_id, $_SESSION['user']['user_id']);
}

header("Location: index.php?act=wishlist");
die();
?>