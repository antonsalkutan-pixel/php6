<?php

$file = 'data.json';

$data = [];

if (file_exists($file)) {

    $json = file_get_contents($file);

    $data = json_decode($json, true);

    if (!is_array($data)) {
        $data = [];
    }
}

/**
 * Сортировка
 */
$sort = $_GET['sort'] ?? '';

if ($sort == 'category') {

    usort($data, function ($a, $b) {
        return strcmp($a['category'], $b['category']);
    });

} elseif ($sort == 'date') {

    usort($data, function ($a, $b) {
        return strcmp($a['created_at'], $b['created_at']);
    });
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список фактов</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Список фактов</h1>

<a href="list.php?sort=category">Сортировать по категории</a>
<br><br>
<a href="list.php?sort=date">Сортировать по дате</a>
<br><br>

<table>

<tr>
    <th>Название</th>
    <th>Описание</th>
    <th>Категория</th>
    <th>Дата</th>
    <th>Автор</th>
    <th>Реальный</th>
</tr>

<?php foreach ($data as $fact): ?>

<tr>

    <td><?= $fact['title'] ?></td>
    <td><?= $fact['description'] ?></td>
    <td><?= $fact['category'] ?></td>
    <td><?= $fact['date_discovered'] ?></td>
    <td><?= $fact['author'] ?></td>
    <td><?= $fact['is_real'] ?></td>

</tr>

<?php endforeach; ?>

</table>

<br>

<a href="index.php">Назад</a>

</body>
</html>
