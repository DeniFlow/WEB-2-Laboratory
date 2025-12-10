<?php
require_once __DIR__ . '/includes/databaseconnect.php';

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) die("Товар не найден.");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать товар</title>
</head>
<body>
<h1>Редактировать товар</h1>

<form action="update_product.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label>Название:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>

    <label>Алиас:</label>
    <input type="text" name="alias" value="<?= htmlspecialchars($product['alias']) ?>" required><br>

    <label>Цена:</label>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>

    <label>Короткое описание:</label>
    <textarea name="short_description" required><?= htmlspecialchars($product['short_description']) ?></textarea><br>

    <label>Полное описание:</label>
    <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea><br>

    <label>Изображение (новое):</label>
    <input type="file" name="image"><br>

    <button type="submit">Сохранить</button>
</form>

<a href="index.php">Вернуться к списку товаров</a>
</body>
</html>