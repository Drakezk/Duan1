<?php
session_start();
require_once "../dao/products.php";
require_once "../dao/wishlist.php";
if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product = select_product_by_id($_POST['wishlist']);
        $wishlist = select_wishlist_by_uid($_SESSION['user']['user_id']);

        $product_in_list = select_wishlist_by_product_user($_POST['wishlist'],$_SESSION['user']['user_id']);
       if(!$product_in_list){
         // add to list
         add_wishlist($_SESSION['user']['user_id'], $product['product_id']);
       }
       $count = count_wishlist($_SESSION['user']['user_id']);
       echo $count['total'];
    }

} else {
    echo "login";
}
?>