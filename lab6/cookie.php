<?php
declare(strict_types=1);

/*
 * Скрипт управления cookie
 * 
 * Этот скрипт отслеживает посещения пользователя с помощью cookie и отображает:
 * - Приветственное сообщение для первых посетителей
 * - Количество посещений и дату последнего визита для возвращающихся пользователей
 */

/*
ЗАДАНИЕ 1
- Инициализируйте переменную для подсчета количества посещений
- Если соответствующие данные передавались через куки
  сохраняйте их в эту переменную 
- Нарастите счетчик посещений
- Инициализируйте переменную для хранения значения последнего посещения страницы
- Если соответствующие данные передавались из куки, отфильтруйте их и сохраните в эту переменную.
  Для фильтрации используйте функции trim(), htmlspecialchars()
- С помощью функции setcookie() установите соответствующие куки.  Задайте время хранения куки 1 сутки. 
  Для задания времени последнего посещения страницы используйте функцию date()
*/

// Инициализация переменной для подсчета посещений
$visitCount = 0;

/**
 * Получает количество посещений из cookie
 * @return int Количество посещений
 */
function getVisitCountFromCookie(): int {
    if (isset($_COOKIE['visit_count'])) {
        return (int)trim(htmlspecialchars($_COOKIE['visit_count']));
    }
    return 0;
}

/**
 * Получает дату последнего посещения из cookie
 * @return string Дата последнего посещения
 */
function getLastVisitFromCookie(): string {
    if (isset($_COOKIE['last_visit'])) {
        return trim(htmlspecialchars($_COOKIE['last_visit']));
    }
    return '';
}

// Получаем данные из cookie
$visitCount = getVisitCountFromCookie();
$lastVisit = getLastVisitFromCookie();

// Увеличиваем счетчик посещений
$visitCount++;

// Устанавливаем текущее время для последнего посещения
$currentDateTime = date('d-m-Y H:i:s');

// Устанавливаем cookie на 1 сутки (86400 секунд)
setcookie('visit_count', (string)$visitCount, time() + 86400);
setcookie('last_visit', $currentDateTime, time() + 86400);
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
- Выводите информацию о количестве посещений и дате последнего посещения
*/

/**
 * Выводит информацию о посещениях
 * @param int $visitCount Количество посещений
 * @param string $lastVisit Дата последнего посещения
 */
function displayVisitInfo(int $visitCount, string $lastVisit): void {
    if ($visitCount === 1) {
        echo "<p>Добро пожаловать!</p>";
    } else {
        echo "<p>Вы зашли на страницу {$visitCount} раз</p>";
        if (!empty($lastVisit)) {
            echo "<p>Последнее посещение: {$lastVisit}</p>";
        }
    }
}

// Выводим информацию о посещениях
displayVisitInfo($visitCount, $lastVisit);
?>

</body>
</html>
