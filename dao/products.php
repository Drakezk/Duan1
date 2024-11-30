<?php
require_once "pdo.php";
function select_all_products(){
    $sql = "SELECT * FROM products ;";
    return pdo_query($sql);
}

function select_products_by_page($start,$limit){
    $sql = "SELECT * FROM products ORDER by product_id DESC LIMIT $start, $limit;";
    return pdo_query($sql);
}

function count_all_products(){
    $sql = "SELECT count(*) as total FROM products;";
    return pdo_query_one($sql);
}

function count_all_products_by_category($category_id){
    $sql = "SELECT count(*) as total FROM products where category_id = '$category_id';";
    return pdo_query_one($sql);
}

function add_product($category_id, $name, $description, $price, $date_added, $quantity){
    $sql = "INSERT INTO products (category_id, name, description, price, date_added, quantity, sold)
    VALUES (?, ?, ?, ?, ?, ?, '0') ;";
    return pdo_execute($sql,$category_id, $name, $description, $price, $date_added, $quantity);
}

function delele_product_by_id($product_id){
    $sql = "DELETE FROM products WHERE product_id = '$product_id' ;";
    return pdo_execute($sql);
}
function select_product_by_id($product_id){
    $sql = "SELECT * FROM products WHERE product_id = '$product_id';";
    return pdo_query_one($sql);
}

function edit_product_by_id($category_id, $name, $quantity, $price, $description,$product_id){
    $sql = "UPDATE products SET category_id = ?, name = ?, quantity = ?, price = ?, description = ?
     WHERE product_id = ? ;"; 
    return pdo_execute($sql, $category_id, $name, $quantity, $price, $description,$product_id);
}

function top_selling(){
    $sql = "SELECT * FROM products order by sold desc limit 4";  
    return pdo_query($sql);
}

// filter, search,

function count_all_products_by_keyword($keyword){
    $sql = "SELECT count(*) as total FROM products inner JOIN categories ON categories.category_id = products.category_id
    WHERE categories.name LIKE '%$keyword%' OR products.name LIKE '%$keyword%';";
    return pdo_query_one($sql);
}

function select_all_products_by_category($category_id,$start,$limit){
    $sql = "SELECT *  FROM products where category_id = '$category_id' limit $start, $limit;";
    return pdo_query($sql);
}

function select_all_products_by_keyword($keyword,$start,$limit){
    $sql = "SELECT products.* FROM products inner JOIN categories ON categories.category_id = products.category_id
    WHERE categories.name LIKE '%$keyword%' OR products.name LIKE '%$keyword%' limit $start, $limit;";
    return pdo_query($sql);
}

function select_all_products_filter($filter,$start,$limit){
    $sql = "SELECT * FROM products order by $filter limit $start, $limit;";
    return pdo_query($sql);
}

function count_all_products_sold_by_user_product_id($user_id,$product_id){
    $sql ="SELECT count(orders.order_id) as total FROM products
     INNER join product_variants on products.product_id = product_variants.product_id 
     INNER JOIN cart on cart.variant_id = product_variants.variant_id 
     iNNER join order_carts on cart.cart_id = order_carts.cart_id 
     INNER JOIN orders on order_carts.order_id = orders.order_id 
     INNER join users on users.user_id = orders.user_id 
     WHERE orders.order_status = 1 AND users.user_id = '$user_id' 
     AND products.product_id = '$product_id' GROUP BY orders.order_id;";
     return pdo_query_one($sql);
}

function update_product_after_order($product_id, $quantity){
    $sql = "UPDATE `products` SET `quantity`= (quantity - $quantity),`sold`= (sold + $quantity ) WHERE product_id = '$product_id' ;";
    pdo_execute($sql);
}


?>