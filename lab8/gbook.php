<?php
declare(strict_types=1);

/**
 * Лабораторная работа №8. Гостевая книга.
 */

/* ЗАДАНИЕ 1 */

// Подключаем конфигурацию
require_once 'config.php';

// Подключаемся к серверу MySQL
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Проверка соединения
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Устанавливаем кодировку
mysqli_set_charset($link, DB_CHARSET);

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Получаем данные
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $msg = $_POST['msg'] ?? '';

    // Фильтрация (trim -> htmlspecialchars -> mysqli_real_escape_string)
    $name = mysqli_real_escape_string($link, htmlspecialchars(trim($name)));
    $email = mysqli_real_escape_string($link, htmlspecialchars(trim($email)));
    $msg = mysqli_real_escape_string($link, htmlspecialchars(trim($msg)));

    // Если поля не пустые — добавляем
    if ($name && $email && $msg) {
        $sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
        
        $result = mysqli_query($link, $sql);

        if ($result) {
            // Перезапрос страницы
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Ошибка добавления: " . mysqli_error($link);
        }
    }
}

/* ЗАДАНИЕ 3 (Удаление) */
if (isset($_GET['del'])) {
    $del = (int)$_GET['del']; // Фильтрация ID
    
    $sql = "DELETE FROM msgs WHERE id = $del";
    mysqli_query($link, $sql);

    // Перезапрос страницы
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Гостевая книга</title>
    <style>
        body{font-family: sans-serif; padding: 20px;}
        form{background: #f4f4f4; padding: 20px; border-radius: 5px; margin-bottom: 20px;}
        .msg{border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; border-radius: 5px;}
    </style>
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Ваше имя:<br>
    <input type="text" name="name" required><br>
    Ваш E-mail:<br>
    <input type="email" name="email" required><br>
    Сообщение:<br>
    <textarea name="msg" cols="50" rows="5" required></textarea><br>
    <br>
    <input type="submit" value="Добавить!">
</form>

<?php
/* ЗАДАНИЕ 2 (Вывод) */

// SQL на выборку в обратном порядке
$sql = "SELECT id, name, email, msg FROM msgs ORDER BY id DESC";
$result = mysqli_query($link, $sql);

// Закрываем соединение с БД (как в задании - до вывода)
mysqli_close($link);

// Получаем количество записей
// Внимание: mysqli_num_rows требует активного $result, который мы получили до закрытия соединения
$count = mysqli_num_rows($result);

echo "<p>Всего сообщений: <strong>$count</strong></p>";

// Вывод в цикле
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $msg = nl2br($row['msg']); // Сохраняем переносы строк

    echo "<div class='msg'>";
    echo "<p><strong>$name</strong> (<a href='mailto:$email'>$email</a>)</p>";
    echo "<p>$msg</p>";
    // Ссылка на удаление
    echo "<p align='right'><a href='?del=$id' onclick='return confirm(\"Удалить?\")'>Удалить</a></p>";
    echo "</div>";
}
?>

</body>
</html>
