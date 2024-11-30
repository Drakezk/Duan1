<?php
require_once "pdo.php";
function add_order_cart($cart_id, $order_id){
    $sql = "INSERT INTO order_carts (`cart_id`,`order_id`) VALUES ('$cart_id','$order_id');"; 
    return pdo_execute($sql);
}
?>