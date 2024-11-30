<?php
require_once "pdo.php";

function add_cart($user_id,$variant_id,$quantity){
    $sql = "INSERT INTO cart(user_id,variant_id,quantity,status) VALUES  ('$user_id', '$variant_id', '$quantity', b'0')";
    return pdo_execute($sql);
}

function count_cart_user($user_id){
    $sql = "SELECT count(*) as total FROM cart WHERE user_id = '$user_id' and status = b'0' ;";
    return pdo_query_one($sql);
}

function select_cart_by_user_id($user_id){
    $sql = "SELECT products.product_id,products.price,products.name,images.img_name,sizes.size_name,color.color_name,cart.quantity,cart.cart_id FROM `products` INNER JOIN images ON products.product_id = images.product_id 
    INNER JOIN product_variants on products.product_id = product_variants.product_id INNER join sizes on sizes.size_id = product_variants.size_id
    INNER JOIN color on product_variants.color_id = color.color_id INNER JOIN cart on cart.variant_id = product_variants.variant_id
    WHERE user_id = '$user_id' and status = b'0' GROUP BY cart.cart_id;";
    return pdo_query($sql);
}

function delete_cart($cart_id){
    $sql = "DELETE FROM cart WHERE cart_id = '$cart_id' and status = b'0';";
    pdo_execute($sql);
}


function select_product_name_by_cart_id($cart_id){
    $sql = "SELECT products.name as name FROM products INNER join product_variants on products.product_id = product_variants.product_id
    INNER JOIN cart on cart.variant_id = product_variants.variant_id WHERE cart.cart_id = $cart_id;";
    return pdo_query_one($sql);
}

function cart_update_status($cart_id){
    $sql = "UPDATE cart SET status = b'1' WHERE cart_id = '$cart_id';";
    return pdo_execute($sql);
}

function cart_update_quantity($cart_id,$quantity){
    $sql = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cart_id';";
    pdo_execute($sql);
}



?>