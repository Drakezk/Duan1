<?php
require_once "pdo.php";

function select_all_users(){
    $sql = "SELECT * FROM users ;";
    return pdo_query($sql);
}

function count_users(){
    $sql = "SELECT count(*) as total FROM users;";
    return pdo_query_one($sql);
}

function add_user($email,$password,$type,$name,$address,$phone_number,$photo,$status,$created_on,$sex){
    $sql = "INSERT INTO users (email,password,type,name,address,phone_number,photo,status,created_on,sex) 
    VALUES ('$email','$password',b'$type','$name','$address','$phone_number','$photo',b'$status','$created_on','$sex') ;";
    return pdo_execute($sql);
}


function delete_user($user_id){
    $sql = "DELETE FROM users WHERE user_id = $user_id;";
    pdo_execute($sql);
}

function select_one_user($user_id){
    $sql = "SELECT * FROM users WHERE user_id = $user_id ;";
    return pdo_query_one($sql);
}

function update_user($user_id,$email,$type,$name,$address,$phone_number,$photo,$status,$sex){
    if(strlen($photo) == 0){
        $sql = "update users set email='$email', type=b'$type', name='$name', address='$address', phone_number='$phone_number', status=b'$status', sex='$sex' where user_id='$user_id' ;";
    }else{
        $sql = "update users set email='$email', type=b'$type', name='$name', address='$address', phone_number='$phone_number', photo='$photo', status=b'$status', sex='$sex' where user_id='$user_id' ;";
    }
    pdo_execute($sql);
}
function select_user_by_page($start,$limit){
    $sql = "SELECT * FROM users LIMIT $start, $limit;";
    return pdo_query($sql);
}

function login($user_name)
{
    $sql = "SELECT * FROM users WHERE email = '$user_name';";
    return pdo_query_one($sql);
}

function register($email, $hash_password, $name, $created_on){
    $sql = "INSERT INTO users (email, password, type, name, status, created_on) values 
    ('$email', '$hash_password', b'0', '$name', b'1', '$created_on');";
    return pdo_execute($sql);
}


function update_password($userid, $new_password){
    $sql = "UPDATE users SET password = '$new_password' WHERE user_id = '$userid'";
    pdo_execute($sql);
}


function select_user_by_email($email){
    $sql = "SELECT * FROM users WHERE email = '$email' ;";
    return pdo_query($sql);
}

function update_profile($name, $email, $sex, $phone,$address,$id){
    $sql = "UPDATE users SET name = '$name', email = '$email' ,sex = '$sex' ,phone_number = '$phone' ,address = '$address' WHERE user_id = '$id' ;";
    pdo_execute($sql);
}

function count_all_users_by_keyword($keyword){
    $sql = "SELECT count(*) as total FROM users WHERE user_id like '%$keyword%' or name like '%$keyword%' or email like '%$keyword%' ;";
    return pdo_query_one($sql);
}

function select_all_user_by_keyword($keyword, $start, $limit){
    $sql =  "SELECT * FROM users WHERE user_id like '%$keyword%' or name like '%$keyword%' or email like '%$keyword%' ;";
    return pdo_query($sql);
}

function update_photo($photo, $user_id){
    $sql = "UPDATE users SET photo = ? WHERE user_id = ? ;";
    pdo_execute($sql,$photo,$user_id);
}
?>