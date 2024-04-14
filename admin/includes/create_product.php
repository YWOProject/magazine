<?php
require_once 'core/db.php';

session_start();

$title = $_POST['title'];
$text = $_POST['text'];
$price = $_POST['price'];
$image_name = time() . '_' . $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], "../../assets/images/$image_name");

$query = "INSERT INTO products (title, text, price, image) VALUES ('$title', '$text', '$price', '$image_name')";
$response = mysqli_query($db, $query);

header('Location: ../products.php');