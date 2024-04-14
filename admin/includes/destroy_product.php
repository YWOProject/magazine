<?php
require_once 'core/db.php';

session_start();

$id = $_GET['id'];

$query = "DELETE FROM products WHERE id = '$id'";
$response = mysqli_query($db, $query);

header('Location: ../products.php');