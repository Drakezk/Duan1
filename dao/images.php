<?php
require_once "pdo.php";

function add_image($img_name, $product_id){
    $sql = "INSERT INTO images (img_name, product_id) VALUES ('$img_name','$product_id') ;";
    return pdo_execute($sql);
}

function select_img_by_product_id($product_id){
    $sql = "SELECT * from images WHERE product_id = $product_id ;";
    return pdo_query($sql);
}

function delete_img_by_product_id($product_id){
    $sql = "DELETE FROM images WHERE product_id = $product_id ;";
    pdo_execute($sql);
}

function delete_img_by_id($id){
    $sql = "DELETE FROM images WHERE img_id = $id ;";
    pdo_execute($sql);
}

function seclect_img_by_id($id){
    $sql = "SELECT * FROM images WHERE img_id = $id ;";
    return pdo_query_one($sql);
}

function select_one_img_by_product_id($product_id){
    $sql = "SELECT * from images WHERE product_id = $product_id ;";
    return pdo_query_one($sql);
}
?>