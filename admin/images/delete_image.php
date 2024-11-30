<?php
require_once "../../dao/images.php";

$img_id = $_GET['img_id'];
$product_id = $_GET['product_id'];
// seclet img
$img = seclect_img_by_id($img_id);
$img_name = $img['img_name'];
print_r($img);
// path of image
$img_path = "../../content/img/products/$product_id/$img_name";

if (file_exists($img_path)) {
    // delete image from database
    delete_img_by_id($img_id);
        // Xóa tệp tin
    unlink($img_path);
}

header("location: ../index.php?act=edit_product&product_id=$product_id");
die();

?>