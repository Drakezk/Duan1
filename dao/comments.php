<?php
require_once "pdo.php";
function add_comment($msg, $user_id, $product_id){
    $sql = "INSERT INTO comments (comment_content,user_id, product_id) VALUES (?,?,?);";
    return pdo_execute($sql,$msg, $user_id, $product_id);
}

function select_all_comment_by_product($product_id){
    $sql = "SELECT users.name, users.photo, comments.comment_content FROM `comments` INNER JOIN products on products.product_id = comments.product_id INNER JOIN users ON comments.user_id=users.user_id
    WHERE products.product_id = '$product_id' ;";
    return pdo_query($sql);
}
?>