<?php
require_once __DIR__ . '/includes/databaseconnect.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Неверный ID товара.");
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Товар не найден.");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($product['name']) ?> — Сити-Класс</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <table class="header" width="100%">
            <tr>
                <td width="200">
                    <a href="index.html"><img src="images/logo.svg" alt="Логотип"></a>
                </td>
                <td class="title">Сити-Класс</td>
                <td width="200"></td>
            </tr>
        </table>
    </header>

    <nav class="nav">
        <ul>
            <li><a href="catalog.php" class="active">Каталог</a></li>
            <li><a href="about.html">О нас</a></li>
            <li><a href="contacts.html">Контакты</a></li>
        </ul>
    </nav>

    <main>
        <div class="content" style="padding:20px;">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="300">
            <p><strong>Цена:</strong> <?= number_format($product['price'], 2, ',', ' ') ?> ₽</p>
            <p><strong>Короткое описание:</strong> <?= htmlspecialchars($product['short_description']) ?></p>
            <p><strong>Полное описание:</strong> <?= htmlspecialchars($product['description']) ?></p>
            <br>
            <a href="catalog.php" class="button">Назад к каталогу</a>
        </div>
    </main>

    <footer class="footer">
        8 (804) 333 71 26 © 2025 Сити-Класс. Все права защищены.
    </footer>
</div>
</body>
</html>
