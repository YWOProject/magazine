<?php
require_once 'core/db.php';

session_start();

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['pass'];
$password_confirmation = $_POST['password_confirmation'];

if ($login === '' || $email === '' || $password === '') {
    $_SESSION['message'] = "Заполните все поля";

    header('Location: ../register.php');
    die();
}

if ($password === $password_confirmation) {
    $password = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (login, email, pass) VALUES ('$login', '$email', '$password')";
    $response = mysqli_query($db, $query);
    header('Location: ../login.php');
} else {
    $_SESSION['message'] = "Пароль и подтверждение пароля не совпадают";

    header('Location: ../register.php');
}