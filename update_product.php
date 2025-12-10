<?php
require_once __DIR__ . '/includes/databaseconnect.php';

$id = intval($_POST['id']);
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

if ($image_path) {
    $sql = "UPDATE product SET name=:name, alias=:alias, price=:price, short_description=:short_description, description=:description, image=:image WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name'=>$name,
        ':alias'=>$alias,
        ':price'=>$price,
        ':short_description'=>$short_description,
        ':description'=>$description,
        ':image'=>$image_path,
        ':id'=>$id
    ]);
} else {
    $sql = "UPDATE product SET name=:name, alias=:alias, price=:price, short_description=:short_description, description=:description WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name'=>$name,
        ':alias'=>$alias,
        ':price'=>$price,
        ':short_description'=>$short_description,
        ':description'=>$description,
        ':id'=>$id
    ]);
}

echo "Товар обновлён.<br>";
echo '<a href="index.php">Вернуться к списку товаров</a>';