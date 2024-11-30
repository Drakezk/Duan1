<?php 
require_once "pdo.php";

function add_variant($product_id,$size_id, $color_id){
    $sql = "INSERT INTO product_variants (product_id, size_id, color_id) VALUES ('$product_id', '$size_id', '$color_id');";
    return pdo_execute($sql);
}

function select_variant_by_id($variant_id){
    $sql ="SELECT product_variants.*, color.color_name, sizes.size_name FROM `product_variants` INNER JOIN color ON product_variants.color_id=color.color_id 
    INNER join sizes ON product_variants.size_id = sizes.size_id WHERE product_variants.variant_id = '$variant_id';";
    return pdo_query_one($sql);
}

?>