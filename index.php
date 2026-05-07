<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог странных фактов</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Добавление странного факта</h1>

<form action="save.php" method="POST">

    <label>Название факта:</label>
    <input type="text" name="title" required minlength="3" maxlength="100">

    <label>Описание:</label>
    <textarea name="description" required minlength="10"></textarea>

    <label>Категория:</label>
    <select name="category" required>
        <option value="">Выберите категорию</option>
        <option value="Наука">Наука</option>
        <option value="Животные">Животные</option>
        <option value="Космос">Космос</option>
        <option value="Странности">Странности</option>
    </select>

    <label>Дата обнаружения:</label>
    <input type="date" name="date_discovered" required>

    <label>Автор:</label>
    <input type="text" name="author" required>

    <label>
        <input type="checkbox" name="is_real">
        Факт является реальным
    </label>

    <button type="submit">Сохранить</button>

</form>

<br>

<a href="list.php">Посмотреть все факты</a>

</body>
</html>
