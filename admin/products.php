<?php
require_once 'includes/core/db.php';

session_start();

$query = "SELECT * FROM products";
$response = mysqli_query($db, $query);
$products = mysqli_fetch_all($response, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ / Продукты</title>
</head>
<body>
    
<div class="HCenter">
            <div class="group_button">
                <?php if(isset($_SESSION['user'])) { ?>
                <span style="text-align: left; color: black; display: block;"><?= $_SESSION['user']['login'] ?></span>
                <form action="../../includes/logout.php">
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
            <a href="products.php">продукты</a>
        </div>  
        <div>
    <a href="create_product.php">Создать товар</a>
</div>

<div>
    <table>
        <tr>
            <th>
                id
            </th>
            <th>
                Заголовок
            </th>
            <th>
                Описание
            </th>
            <th>
                Цена
            </th>
            <th>
                Изображение
            </th>
            <th>
                Действия
            </th>
        </tr>
        <?php foreach ($products as $product) { ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['title'] ?></td>
            <td><?= $product['text'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><img src="../assets/images/<?= $product['image'] ?>" style="max-height: 30px" alt=""></td>
            <td>
                <a href="edit_product.php?id=<?= $product['id'] ?>">Редактировать</a>
                <a href="includes/destroy_product.php?id=<?= $product['id'] ?>">Удалить</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>