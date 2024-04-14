<?php
require_once 'core/db.php';

session_start();

$login = $_POST['login'];
$password = $_POST['pass'];

if ($login === '' || $password === '') {
    $_SESSION['message'] = "Заполните все поля";

    header('Location: ../login.php');
    die();
}

$query = "SELECT * FROM users WHERE (login = '$login' OR email = '$login') LIMIT 1";
$response = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($response);
if (is_null($user)) {
    $_SESSION['message'] = "Неверный логин или почта";

    header('Location: ../login.php');
    die();
}
elseif (password_verify($password, $user['pass'])) {
    $_SESSION['user'] = $user;
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = "Неверный пароль";

    header('Location: ../login.php');
}