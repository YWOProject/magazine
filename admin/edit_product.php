<?php
session_start();

require_once 'includes/core/db.php';

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id = '$id'";
$response = mysqli_query($db, $query);
$product = mysqli_fetch_assoc($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ / Изменить товар</title>
</head>
<body>
<div>
<div class="HCenter">
            <div class="group_button">
                <?php if(isset($_SESSION['user'])) { ?>
                <span style="text-align: left; color: black; display: block;"><?= $_SESSION['user']['login'] ?></span>
                <form action="includes/logout.php">
                    <button class="login">Выйти</button>
                </form>
                <?php if($_SESSION['user']['user_lvl'] == 1) { ?>
                    <form action="index.php">
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
    <form action="includes/update_product.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="заголовок" name="title" value="<?= $product['title'] ?>">
        <textarea name="text" placeholder="описание"><?= $product['text'] ?></textarea>
        <input type="text" placeholder="стоимость" name="price" value="<?= $product['price'] ?>">
        <select name="category">
            <?php foreach ($categories as $category){ ?>
            <option value="<?= $category['id'] ?>" <?= $category['id'] === $product['category'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php } ?>
        </select>
        <input type="file" name="image">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <button>Сохранить</button>
    </form>
</div>
</body>
</html>