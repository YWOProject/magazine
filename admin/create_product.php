<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ / Создать товар</title>
</head>
<body>
<div>
    <form action="includes/create_product.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="заголовок" name="title">
        <textarea name="text" placeholder="описание"></textarea>
        <input type="text" placeholder="стоимость" name="price">
        <input type="file" name="image">
        <button>Создать</button>
    </form>
</div>
</body>
</html>