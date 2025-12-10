<?php
require_once __DIR__ . '/includes/databaseconnect.php';

$id = intval($_GET['id']);
$stmt = $conn->prepare("DELETE FROM product WHERE id=:id");
$stmt->execute([':id'=>$id]);

echo "Товар удалён.<br>";
echo '<a href="index.php">Вернуться к списку товаров</a>';