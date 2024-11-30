<?php
// connect to the database
function pdo_get_connection()
{
    try {
        $host = "localhost";
        $username = "root";
        $dbname = "du_an_1";
        $password = "";
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        return $conn;
    } catch (Exception $e) {
        echo "erorr" . $e->getMessage();
    }
}

// excute the INSERT, UPDATE, or DELETE statement

function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// truy vấn nhiều bản ghi a
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// truy vấn một bản ghi

function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (Exception $e) {
        throw $e;
    } finally {
        unset($sql);
    }
}

// Truy vấn 1 giá trị
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


?>