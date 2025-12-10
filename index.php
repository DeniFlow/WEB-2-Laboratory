<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сити-класс</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <table class="header" width="100%">
        <tr>
            <td width="200">
                <img src="images/logo.svg" alt="Логотип">
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

    <nav class="nav">
        <ul>
            <li><a href="#">раздел 1</a></li>
            <li><a href="#">раздел 2</a></li>
            <li><a href="#">раздел 3</a></li>
            <li><a href="#">раздел 4</a></li>
        </ul>
    </nav>

    <table width="100%">
        <tr>
            <td class="sidebar">
                <a href="pages/about.html">О нас</a>
                <a href="index.html">Главная</a>
                <a href="pages/contacts.html">Контакты</a>
                <a href="catalog.php">Каталог</a>
				<a href="pages/guest.html" class="review-btn">Оставить отзыв</a>
            </td>
            <td class="content">
                <h2 align="center">Сити Класс – интернет-магазин недорогой обуви</h2>
                <p>В нашем интернет-магазине вы можете недорого купить мужскую и женскую обувь оптом и в розницу.</p>

                <table border="1" cellpadding="20" cellspacing="5" align="center">
                    <tr>
                        <td rowspan="3"><p>Осень/Зима</p></td>
                        <td colspan="2" align="center">Новое поступление сумок</td>
                    </tr>
                    <tr>
                        <td>Женская обувь</td>
                        <td>Мужская обувь</td>
                    </tr>
                    <tr>
                        <td>Каталог сумок</td>
                        <td>Аксессуары</td>
                    </tr>
                </table>

                <p><strong>Мы предлагаем своим покупателям:</strong></p>
                <ul>
                    <li>Широкий ассортимент качественной обуви с фабрик Турции и Китая.</li>
                    <li>По низким ценам: от 100 до 5000 руб.</li>
                    <li>На любой сезон: зимнюю, летнюю, демисезонную обувь.</li>
                    <li>Из искусственной и натуральной кожи, экокожи, замши, текстиля.</li>
                    <li>Различных стилей: классическую, повседневную, спортивную.</li>
                    <li>Больших и маленьких размеров.</li>
                    <li>Практичных и модных расцветок.</li>
                    <li>От популярных брендов.</li>
                </ul>
            </td>
        </tr>
    </table>

    <div class="footer">
        8 (804) 333 71 26 © 2025 Сити-Класс. Все права защищены.
    </div>
</div>

</body>
</html>