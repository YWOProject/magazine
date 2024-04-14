<?php
require_once 'includes/core/db.php';
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $query = "SELECT product_id FROM basket WHERE user_id = '{$user['id']}'";
    $response = mysqli_query($db, $query);
    $baskets = mysqli_fetch_all($response);
    if (count($baskets) > 0) {
        $baskets = call_user_func_array('array_merge', $baskets);
        $baskets = implode(',', $baskets);
        $query = "SELECT * FROM products WHERE id IN ($baskets)";
        $response = mysqli_query($db, $query);
        $products = mysqli_fetch_all($response, 1);
    }
} else {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
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
      <div class="login_header"><p>Корзина</p></div>
      <div class="flex_tovars">


          <?php
          if(isset($products)) {
              foreach ($products as $product) { ?>
                  <div class="popular_block">
                      <div class="popular_block2">
                          <img class="popular_image0" src="admin/uploads/<?= $product['image'] ?>">
                          <div class="name"><?= $product['title'] ?></div>
                          <div class="price"><?= $product['price'] ?></div>
                          <div class="popular_item_flex">
                              <a href="includes/add_basket.php?id=<?= $product['id'] ?>" class="popular_basket">Удалить с корзины</a>
                          </div>
                      </div>
                  </div>
              <?php } } else { ?>
              <div style="text-align: center">У вас нет товаров в избранном</div>
          <?php } ?>

         </div>
      </div>
      </main>
</body>
</html>