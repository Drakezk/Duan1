<?php
require_once "pdo.php";
function add_contact($email, $name, $subject,$msg){
    $sql = "INSERT INTO contacts (email, name, subject, message) VALUES (?,?,?,?) ;";
    return pdo_execute($sql,$email,$name,$subject,$msg);
}
?>