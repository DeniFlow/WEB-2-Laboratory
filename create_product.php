<?php
require_once __DIR__ . '/includes/databaseconnect.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
</head>
<body>
<h1>Добавить новый товар</h1>

<form action="add_product.php" method="POST" enctype="multipart/form-data">
    <label>Название:</label>
    <input type="text" name="name" required><br>

    <label>Алиас:</label>
    <input type="text" name="alias" required><br>

    <label>Цена:</label>
    <input type="number" step="0.01" name="price" required><br>

    <label>Короткое описание:</label>
    <textarea name="short_description" required></textarea><br>

    <label>Полное описание:</label>
    <textarea name="description" required></textarea><br>

    <label>Изображение:</label>
    <input type="file" name="image"><br>

    <button type="submit">Добавить</button>
</form>

<a href="index.php">Вернуться к списку товаров</a>
</body>
</html>