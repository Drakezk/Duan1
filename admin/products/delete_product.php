<?php
require_once "../../dao/images.php";
require_once "../../dao/products.php";

$product_id = $_GET['product_id'];
$imgs = select_img_by_product_id($product_id);
if (count($imgs) > 0) {
    foreach ($imgs as $img) {
        $file = "../../content/img/products/$product_id/$img[img_name]";
        if (file_exists($file)) {
            unlink($file);
        }
    }
    if (is_dir('../../content/img/products/'.$product_id)) {
        if (rmdir('../../content/img/products/'.$product_id)) {
        }
    }
    delete_img_by_product_id($product_id);
}

delele_product_by_id($product_id);
setcookie('delete-product', "Deleted product sucessfully", time() + 30);
header("location: ../index.php?act=products");
die();
// ?>