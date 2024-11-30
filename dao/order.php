<?php
require_once 'pdo.php';

function count_all_order(){
    $sql = "SELECT count(*) as total FROM orders ;";
    return pdo_query_one($sql);
}
function add_order($date, $user_id, $total_price, $address, $note, $shipping ){
    $sql = "INSERT INTO orders (order_date, order_status, user_id, total_price, address, note, shipping) VALUES
    ('$date',b'0','$user_id','$total_price','$address','$note', '$shipping');";
    return pdo_execute($sql);
}

function select_order_by_user($user_id){
    $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ;";
    return pdo_query($sql);
}

function select_order_by_id($order_id){
    $sql = "SELECT * FROM orders WHERE order_id = '$order_id' ;";
    return pdo_query_one($sql);
}

function select_all_cart_by_order_id($order_id){
    $sql = "SELECT cart.* , products.price , products.product_id FROM `orders` INNER JOIN order_carts on orders.order_id = order_carts.order_id
    INNER join cart on order_carts.cart_id = cart.cart_id inner join product_variants on cart.variant_id = product_variants.variant_id
    INNER JOIN products ON product_variants.product_id = products.product_id
    WHERE orders.order_id = '$order_id';";  
    return pdo_query($sql);
}

function count_order_by_user($user_id){
    $sql = "SELECT count(*) as total FROM orders WHERE user_id = '$user_id' ;";
    return pdo_query_one($sql);
}

function order_select_all(){
    $sql = "SELECT * FROM orders;";
    return pdo_query($sql);
}

function update_status_by_order_id($order_id, $status){
    $sql = "UPDATE orders SET order_status = b'$status' WHERE order_id = '$order_id';";
    pdo_execute($sql);

}

function order_select_by_page($start,$limit){
    $sql = "SELECT * FROM orders LIMIT $start, $limit ;";
    return pdo_query($sql);
}

function select_all_order_by_keyword($keyword,$start,$limit){
    $sql = "SELECT * FROM orders inner join users on orders.user_id = users.user_id WHERE orders.order_id LIKE '%$keyword%' OR orders.user_id LIKE '%$keyword%' 
    or users.name like '%$keyword%' or users.email like '%$keyword%' limit $start, $limit;";
    return pdo_query($sql);
}

function count_all_order_by_keyword($keyword){
    $sql = "SELECT count(*) as total FROM orders WHERE order_id LIKE '%$keyword%' OR user_id LIKE '%$keyword%';";
    return pdo_query_one($sql);
}
?>

