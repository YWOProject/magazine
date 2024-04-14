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
    <title>Регистрация</title>
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
        <div class="login_header"><p>Регистрация</p></div>
        <div class="login_form">
          <form action="includes/register.php" method="post">
              <p>Чтобы авторизироваться,<br>введите данные своей учётной записи</p>
              <label for="">Почта Mail<br></label>
              <input type="text" placeholder="Например Ivanow@mail.ru" name="email">
              <label for="">Логин<br></label>
              <input type="text" placeholder="Введите логин" name="login">
              <label for="">Пароль<br></label>
              <input type="password" class="pass" name="pass" placeholder="Введите пароль">
              <label for="">Повторите пароль<br></label>
              <input type="password" class="pass" name="password_confirmation" placeholder="Подтвердите пароль">
              <span style="text-align: center; display: block;"><?= $message ?></span>
              <button class="logGo">Зарегистрироваться</button>
          </form>
          <div class="log_question">
              <div class="maybe_reg"><p>Уже есть аккаунт?</p><a href="login.php">Войти</a></div>
          </div>
      </div>
        </main>
</body>
</html>