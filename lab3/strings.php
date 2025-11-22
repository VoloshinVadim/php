<?php
declare(strict_types=1);

/**
 * Лабораторная №3. Обработка строк.
 */

/*
 ЗАДАНИЕ 1: Создание переменных
*/
$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';

function checkPasswordStrength(string $pass): bool
{
    if (mb_strlen($pass) < 8) return false;
    if (!preg_match('/[0-9]/', $pass)) return false;
    if (!preg_match('/[a-z]/', $pass)) return false;
    if (!preg_match('/[A-Z]/', $pass)) return false;
    return true;
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
    <style>body { font-family: sans-serif; padding: 20px; }</style>
</head>
<body>
    <h1>Обработка строк</h1>

<?php
	/*
	 ЗАДАНИЕ 2: Обработка и вывод
	*/

    // 1. Логин: убираем пробелы и делаем строчным
    $login = mb_strtolower(trim($login));
    echo "<p>Логин: <strong>$login</strong></p>";

    // 2. Пароль: проверка сложности
    $isStrong = checkPasswordStrength($password);
    $passResult = $isStrong ? '<span style="color:green">Надежный</span>' : '<span style="color:red">Слабый</span>';
    echo "<p>Пароль ($password): $passResult</p>";

    // 3. Имя: Первая буква заглавная
    $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    echo "<p>Имя: <strong>$name</strong></p>";

    // 4. Email: валидация
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Email ($email): <span style='color:green'>Корректный</span></p>";
    } else {
        echo "<p>Email ($email): <span style='color:red'>Некорректный</span></p>";
    }

    // 5. Вывод кода "как есть"
    echo "<p>Переменная code: <code>" . htmlspecialchars($code) . "</code></p>";
?>
</body>
</html>
