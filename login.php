<?php
session_start();

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/">
    <title>Вход</title>
</head>
<body>
<main>
<div class="HCenter">
            <div class="group_button">
                <?php if(isset($_SESSION['user'])) { ?>
                <span style="text-align: left; color: black; display: block;"><?= $_SESSION['user']['login'] ?></span>
                <form action="includes/logout.php">
                    <button class="login">Выйти</button>
                </form>
                <?php if($_SESSION['user']['user_lvl'] == 1) { ?>
                    <form action="admin/index.php">
                    <button class="login">Админ-панель</button>
                </form>
                <?php } } else { ?>
                <form action="login.php">
                    <button class="login">Вход</button>
                </form>
                <form action="register.php">
                    <button class="registration">Регистрация</button>
                </form>
                <?php } ?>
            </div>
            <a href="basket.php">корзина</a><br>
            <a href="products.php">продукты</a>
        </div>  
        <div class="padding"></div>
        <div class="login_header"><p>Вход</p></div>

        <div class="login_form">
            <form action="includes/login.php" method="post">
                <p>Чтобы авторизироваться,<br>введите данные своей учётной записи</p>
                <label for="">Логин или почта Mail<br></label>
                <input type="text" name="login">
                <label for="">Пароль<br></label>
                <input type="password" name="pass" class="pass"><button class="eye"><img src="images/passeye.png" alt=""></button>
                <span style="text-align: center; display: block;"><?= $message ?></span>
                <button class="logGo">Войти</button>
            </form>
            <div class="log_question">
                <div class="maybe_reg"><p>Нет аккаунта?</p><a href="register.php">Зарегистрироваться</a></div>
                <div class="maybe_repair"><p>Забыли пароль?</p><a href="">Восстановление</a></div>
            </div>
        </div>
    </main>
</body>
</html>