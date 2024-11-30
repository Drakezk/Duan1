<?php
require_once "../../dao/users.php";
$user_id = $_GET['user_id'];
try {
    delete_user($user_id);
    setcookie('delete-product', "Done delete user", time() + 30);
    header("Location: ../index.php?act=users");
    die();
} catch (Exception $e) {
    echo "Error : " . $e->getMessage();
}
