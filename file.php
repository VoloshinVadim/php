<?php
declare(strict_types=1);

/**
 * Скрипт для записи данных формы в текстовый файл (Гостевая книга).
 */

/*
 ЗАДАНИЕ 1
*/

// Установите константу для хранения имени файла
define('FILENAME', 'db/guestbook.txt');

// Проверьте, отправлялась ли форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Получаем данные
    $fname = $_POST['fname'] ?? '';
    $lname = $_POST['lname'] ?? '';

    // Фильтрация: trim -> strip_tags -> htmlspecialchars
    $fname = htmlspecialchars(strip_tags(trim($fname)));
    $lname = htmlspecialchars(strip_tags(trim($lname)));

    // Проверяем, что поля не пустые
    if (!empty($fname) && !empty($lname)) {
        // Сформируйте строку для записи в файл (добавляем перенос строки PHP_EOL)
        $row = "$fname $lname" . PHP_EOL;

        // Откройте соединение и запишите (file_put_contents делает это в одну команду)
        // FILE_APPEND - дописать в конец, LOCK_EX - блокировка файла от одновременной записи
        file_put_contents(FILENAME, $row, FILE_APPEND | LOCK_EX);

        // Используя функцию header() выполните перезапрос текущей страницы
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
    Имя: <input type="text" name="fname" required><br>
    Фамилия: <input type="text" name="lname" required><br>
    <br>
    <input type="submit" value="Отправить!">
</form>

<h2>Список пользователей:</h2>
<?php
/*
 ЗАДАНИЕ 2
*/

// Проверьте, существует ли файл
if (file_exists(FILENAME)) {
    
    // Получите все содержимое файла в виде массива строк
    $lines = file(FILENAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    if (is_array($lines)) {
        echo "<ol>";
        // В цикле выведите все строки
        foreach ($lines as $line) {
            echo "<li>" . htmlspecialchars($line) . "</li>";
        }
        echo "</ol>";
    }
    
    // Выведите размер файла в байтах
    echo "<p><strong>Размер файла: " . filesize(FILENAME) . " байт</strong></p>";

} else {
    echo "<p>Записей пока нет.</p>";
}
?>

</body>
</html>
