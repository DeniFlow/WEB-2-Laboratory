<?php
require_once __DIR__ . '/includes/databaseconnect.php';

// Получаем выбранную сортировку
$sort = $_GET['sort'] ?? 'name_asc';

// Определяем ORDER BY
switch ($sort) {
    case 'price_asc':  $order = "price ASC"; break;
    case 'price_desc': $order = "price DESC"; break;
    case 'name_desc':  $order = "name DESC"; break;
    default:           $order = "name ASC";
}

// Получаем товары с сортировкой
$stmt = $conn->query("SELECT * FROM product ORDER BY $order");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог — Сити-Класс</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <table class="header" width="100%">
            <tr>
                <td width="200">
                    <a href="index.php"><img src="images/logo.svg" alt="Логотип"></a>
                </td>
                <td class="title">Сити-Класс</td>
                <td width="200">
                    <table class="login-table" width="100%">
                        <tr>
                            <td align="right">логин:</td>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <td align="right">пароль:</td>
                            <td><input type="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right">
                                <input type="submit" value="Войти">
                                <button type="button" onclick="window.location.href='register.html'">Зарегистрироваться</button>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </header>

    <nav class="nav">
        <ul>
            <li><a href="#">раздел 1</a></li>
            <li><a href="#">раздел 2</a></li>
            <li><a href="#">раздел 3</a></li>
            <li><a href="#">раздел 4</a></li>
        </ul>
    </nav>

    <main>
        <table width="100%">
            <tr>
                <td class="sidebar">
                    <a href="pages/about.html">О нас</a>
                    <a href="index.php">Главная</a>
                    <a href="pages/contacts.html">Контакты</a>
                    <a href="catalog.php" class="active">Каталог</a>
                    <a href="pages/guest.html" class="review-btn">Оставить отзыв</a>
                </td>

                <td class="content">

                    <!-- КНОПКА ДОБАВИТЬ -->
                    <div style="text-align:center; margin-bottom:20px;">
                        <button onclick="window.location.href='create_product.php'" class="button">
                            Добавить продукт
                        </button>
                    </div>

                    <!-- СОРТИРОВКА -->
                    <div style="text-align:center; margin-bottom:20px;">
                        <form method="GET" action="catalog.php">
                            <label>Сортировать по:</label>
                            <select name="sort" onchange="this.form.submit()">
                                <option value="name_asc"  <?= $sort=='name_asc'?'selected':'' ?>>Название (А–Я)</option>
                                <option value="name_desc" <?= $sort=='name_desc'?'selected':'' ?>>Название (Я–А)</option>
                                <option value="price_asc" <?= $sort=='price_asc'?'selected':'' ?>>Цена (по возрастанию)</option>
                                <option value="price_desc"<?= $sort=='price_desc'?'selected':'' ?>>Цена (по убыванию)</option>
                            </select>
                        </form>
                    </div>

                    <!-- ПОИСК -->
                    <div class="search-box">
                        <form name="f1" method="post" action="search.php">
                            <input type="search" name="search_q" placeholder="Введите первую букву товара"/>
                            <br><br>
                            <input type="submit" value="Поиск"/>
                        </form>
                    </div>

                    <h2 align="center">Каталог товаров</h2>
                    <p align="center">Здесь вы найдете самые популярные модели сезона!</p>

                    <!-- СПИСОК ТОВАРОВ -->
                    <div class="products">
                        <?php if (count($products) > 0): ?>
                            <?php foreach ($products as $p): ?>
                                <div class="product">
                                    <img src="<?= htmlspecialchars($p['image']) ?>" 
                                         alt="<?= htmlspecialchars($p['name']) ?>" 
                                         width="200">

                                    <h3><?= htmlspecialchars($p['name']) ?></h3>
                                    <p><?= htmlspecialchars($p['short_description']) ?></p>
                                    <p>Цена: <?= number_format($p['price'], 2, ',', ' ') ?> ₽</p>

                                    <div style="margin-top:10px;">
                                        <a href="product_details.php?id=<?= $p['id'] ?>&sort=<?= $sort ?>" class="button">Подробнее</a>
                                        <a href="edit_product.php?id=<?= $p['id'] ?>" class="button">Изменить</a>
                                        <a href="delete_product.php?id=<?= $p['id'] ?>" class="button"
                                           onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">
                                            Удалить
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Товары не найдены.</p>
                        <?php endif; ?>
                    </div>

                </td>
            </tr>
        </table>
    </main>

    <footer class="footer">
        8 (804) 333 71 26 © 2025 Сити-Класс. Все права защищены.
    </footer>
</div>
</body>
</html>