<?php
// Массив товаров/услуг
$products = [
    "Ботинки" => [
        "description" => "Мужские ботинки из натуральной кожи. Осень/зима.",
        "price" => "3500 руб",
        "image" => "../images/boots_men.jpg"
    ],
    "Туфли" => [
        "description" => "Женские туфли, легкие и удобные.",
        "price" => "2800 руб",
        "image" => "../images/boots_women.jpg"
    ],
    "Сапоги" => [
        "description" => "Теплые зимние сапоги с натуральным мехом.",
        "price" => "4200 руб",
        "image" => "../images/shoes3.jpg"
    ],
];

// Проверка отправки формы
$searchResult = [];
if(isset($_POST['search_q'])){
    $q = trim($_POST['search_q']);
    $q = htmlspecialchars($q);

    foreach($products as $name => $info){
        if(mb_strtolower(mb_substr($name, 0, 1)) === mb_strtolower($q)){
            $searchResult[$name] = $info;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результаты поиска — Сити-Класс</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

    <h2>Результаты поиска</h2>

    <?php if(!empty($searchResult)): ?>
        <?php foreach($searchResult as $name => $info): ?>
            <div class="content" style="border:1px solid #ccc; padding:10px; margin:10px 0;">
                <h3><?php echo $name; ?></h3>
                <p><?php echo $info['description']; ?></p>
                <p>Цена: <?php echo $info['price']; ?></p>
                <img src="<?php echo $info['image']; ?>" width="200">
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Товаров, начинающихся с "<?php echo isset($q) ? $q : ''; ?>", не найдено.</p>
    <?php endif; ?>

    <p><a href="index.html">Вернуться на главную</a></p>
</div>
</body>
</html>
