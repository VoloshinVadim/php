<?php
declare(strict_types=1);

/**
 * Лабораторная №6. Задание 1: Cookies.
 * Счетчик посещений и дата последнего визита.
 */

/*
 ЗАДАНИЕ 1
*/

// 1. Инициализируйте переменную для подсчета количества посещений
$visits = 0;

// 2. Если данные передавались через куки, сохраняйте их
if (isset($_COOKIE['visitCount'])) {
    $visits = (int)$_COOKIE['visitCount'];
}

// 3. Нарастите счетчик посещений
$visits++;

// 4. Инициализируйте переменную для хранения последнего посещения
$lastVisit = '';

// 5. Если данные передавались, отфильтруйте и сохраните
if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = htmlspecialchars(trim($_COOKIE['lastVisit']));
}

// 6. Установите куки на сутки (86400 секунд)
setcookie('visitCount', (string)$visits, time() + 86400);

// Текущая дата для записи в куки (будет показана при следующем заходе)
$currentDate = date('d-m-Y H:i:s');
setcookie('lastVisit', $currentDate, time() + 86400);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Последний визит</title>
</head>
<body>

<h1>Последний визит</h1>

<?php
/*
 ЗАДАНИЕ 2
*/
if ($visits === 1) {
    echo "<h2>Добро пожаловать!</h2>";
    echo "<p>Вы зашли на страницу первый раз.</p>";
} else {
    echo "<h2>Вы зашли на страницу $visits раз</h2>";
    echo "<p>Последнее посещение: $lastVisit</p>";
}
?>

</body>
</html>
