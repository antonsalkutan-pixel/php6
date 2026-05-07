<?php

/**
 * Очистка строки от HTML-тегов
 *
 * @param string $data
 * @return string
 */
function clean($data)
{
    return htmlspecialchars(trim($data));
}

$title = clean($_POST['title'] ?? '');
$description = clean($_POST['description'] ?? '');
$category = clean($_POST['category'] ?? '');
$date_discovered = $_POST['date_discovered'] ?? '';
$author = clean($_POST['author'] ?? '');
$is_real = isset($_POST['is_real']) ? 'Да' : 'Нет';

$errors = [];

/**
 * Проверка заполнения полей
 */
if (empty($title)) {
    $errors[] = "Название обязательно";
}

if (strlen($description) < 10) {
    $errors[] = "Описание слишком короткое";
}

if (empty($category)) {
    $errors[] = "Выберите категорию";
}

if (empty($date_discovered)) {
    $errors[] = "Укажите дату";
}

if (empty($author)) {
    $errors[] = "Укажите автора";
}

/**
 * Если есть ошибки
 */
if (!empty($errors)) {

    echo "<h2>Ошибки:</h2>";

    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }

    echo '<a href="index.php">Назад</a>';

    exit;
}

/**
 * Создание массива записи
 */
$newFact = [
    'title' => $title,
    'description' => $description,
    'category' => $category,
    'date_discovered' => $date_discovered,
    'author' => $author,
    'is_real' => $is_real,
    'created_at' => date('Y-m-d H:i:s')
];

/**
 * Чтение старых данных
 */
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
 * Добавление новой записи
 */
$data[] = $newFact;

/**
 * Сохранение JSON
 */
file_put_contents(
    $file,
    json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);

echo "<h2>Факт успешно сохранён!</h2>";

echo '<a href="index.php">Добавить ещё</a><br>';
echo '<a href="list.php">Посмотреть факты</a>';
?>
