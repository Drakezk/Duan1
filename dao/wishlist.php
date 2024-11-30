<?php
require_once "pdo.php";

function add_wishlist($user_id,$product_id){
    $sql = "INSERT INTO wishlist (user_id,product_id) VALUES ('$user_id', '$product_id'); ";
    return pdo_execute($sql);
}

function count_wishlist($user_id){
    $sql = "SELECT count(*) as total FROM wishlist WHERE user_id = '$user_id' ;";
    return pdo_query_one($sql);
}


function select_wishlist_by_uid($user_id){
    $sql = "SELECT * FROM wishlist WHERE user_id = '$user_id';";
    return pdo_query($sql);
}

function select_wishlist_by_product_user($product_id,$user_id){
    $sql = "SELECT * FROM wishlist WHERE user_id = '$user_id' and product_id = '$product_id';";
    return pdo_query($sql);
}

function select_wishlist_by_product_id($product_id){
    $sql = "SELECT * FROM wishlist WHERE product_id = '$product_id';";
    return pdo_query($sql);
}

function delete_wish($product_id, $user_id){
    $sql = "DELETE FROM wishlist WHERE product_id = '$product_id' AND user_id = '$user_id';";
    pdo_execute($sql);
}

?>