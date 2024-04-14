<?php
session_start();

require_once 'core/db.php';

$id = $_GET['id'];

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $query = "SELECT * FROM basket WHERE product_id = '$id' AND user_id = '{$user['id']}'";
    $response = mysqli_query($db, $query);
    if ($response->num_rows > 0) {
        $query = "DELETE FROM basket WHERE product_id = '$id' AND user_id = '{$user['id']}'";
        $response = mysqli_query($db, $query);
    } else {
        $query = "INSERT INTO basket (product_id, user_id) VALUES ('$id', '{$user['id']}')";
        $response = mysqli_query($db, $query);
    }
} else {
    header("Location: ../login.php");
}
header("Location: ../products.php");