<?php
require_once __DIR__ . '/includes/databaseconnect.php';

$name = trim($_POST['name']);
$alias = trim($_POST['alias']);
$price = floatval($_POST['price']);
$short_description = trim($_POST['short_description']);
$description = trim($_POST['description']);

if ($name === '' || $alias === '' || $price <= 0) {
    die("Ошибка: проверьте введённые данные.");
}

$image_path = '';
if (!empty($_FILES['image']['name'])) {
    $image_path = 'uploads/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
}

$sql = "INSERT INTO product 
        (manufacturer_id, name, alias, short_description, description, price, image, available, meta_keywords, meta_description, meta_title)
        VALUES (1, :name, :alias, :short_description, :description, :price, :image, 1, '', '', :name)";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':name' => $name,
    ':alias' => $alias,
    ':short_description' => $short_description,
    ':description' => $description,
    ':price' => $price,
    ':image' => $image_path
]);

echo "Товар успешно добавлен.<br>";
echo '<a href="index.php">Перейти к списку товаров</a>';