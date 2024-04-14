<?php
session_start();

require_once 'includes/core/db.php';
$query = "SELECT * FROM products";
$response = mysqli_query($db, $query);
$products = mysqli_fetch_all($response, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
</head>
<body>
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
<?php foreach ($products as $product) { ?>
              <div class="popular_block">
                  <div class="popular_block2">
                      <img class="popular_image0" src="assets/images/<?= $product['image'] ?>" style="width: 150px; height: 200px; background-size: cover;">
                      <div class="name"><?= $product['title'] ?></div>
                      <div class="price"><?= $product['price'] ?></div>
                      <div class="popular_item_flex">
                          <a href="includes/add_basket.php?id=<?= $product['id'] ?>" class="popular_basket">В корзину</a>
                      </div>
                  </div>
              </div>
          <?php } ?>

         </div>
</body>
</html>