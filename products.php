<?php
require_once __DIR__ . '/includes/databaseconnect.php';
$stmt = $conn->query("SELECT * FROM product ORDER BY name ASC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
<tr>
    <th>ID</th>
    <th>Название</th>
    <th>Цена</th>
    <th>Действия</th>
</tr>

<?php foreach ($products as $p): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td><?= $p['price'] ?></td>
    <td>
        <a href="edit_product.php?id=<?= $p['id'] ?>">Изменить</a>
        <a href="delete_product.php?id=<?= $p['id'] ?>">Удалить</a>
    </td>
</tr>
<?php endforeach; ?>
</table>