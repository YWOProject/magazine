<?php
require_once 'core/db.php';

session_start();

$title = $_POST['title'];
$text = $_POST['text'];
$price = $_POST['price'];
$id = $_POST['id'];

if (!empty($_FILES['image']['name'])) {
    $image_name = time() . '_' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../../assets/images/$image_name");
    $query = "UPDATE products SET title = '$title', text = '$text', price = '$price', image = '$image_name' WHERE id = '$id'";
} else {
    $query = "UPDATE products SET title = '$title', text = '$text', price = '$price' WHERE id = '$id'";
}

$response = mysqli_query($db, $query);

header('Location: ../products.php');