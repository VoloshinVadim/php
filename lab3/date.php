<?php
declare(strict_types=1);

/**
 * Лабораторная №3. Дата и время.
 */

/*
 ЗАДАНИЕ 1: Инициализация переменных
*/
// Текущее время
$now = time();

// День рождения (например, 15 мая 2026 года)
// mktime(часы, минуты, секунды, месяц, день, год)
$birthday = mktime(0, 0, 0, 5, 15, (int)date('Y') + 1);

// Текущий час
$dateArr = getdate();
$hour = $dateArr['hours'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Использование функций даты и времени</title>
    <style>body { font-family: sans-serif; padding: 20px; }</style>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	/*
	 ЗАДАНИЕ 2: Логика приветствия и вывод
	*/
    
    // Приветствие
    if ($hour >= 0 && $hour < 6) {
        $welcome = 'Доброй ночи';
    } elseif ($hour >= 6 && $hour < 12) {
        $welcome = 'Доброе утро';
    } elseif ($hour >= 12 && $hour < 18) {
        $welcome = 'Добрый день';
    } else {
        $welcome = 'Добрый вечер';
    }

    echo "<h2>$welcome</h2>";

    // Вывод текущей даты с помощью IntlDateFormatter (как в задании datefmt_format)
    $fmt = datefmt_create(
        'ru_RU.UTF-8',
        IntlDateFormatter::FULL,
        IntlDateFormatter::MEDIUM,
        'Europe/Moscow',
        IntlDateFormatter::GREGORIAN,
        'Сегодня d MMMM yyyy года, eeee HH:mm:ss'
    );

    if ($fmt) {
        echo "<p>" . datefmt_format($fmt, $now) . "</p>";
    } else {
        // Если модуль Intl выключен на сервере
        echo "<p>" . date("d.m.Y H:i:s") . "</p>";
    }

    // Таймер до дня рождения
    echo "<p>До моего дня рождения осталось: ";
    
    $diff = $birthday - $now; // Разница в секундах

    if ($diff > 0) {
        $days = floor($diff / 86400);
        $hours = floor(($diff % 86400) / 3600);
        $minutes = floor(($diff % 3600) / 60);
        $seconds = $diff % 60;
        
        echo "<strong>$days дн. $hours ч. $minutes мин. $seconds сек.</strong>";
    } else {
        echo "<strong>С днем рождения!</strong>";
    }
    echo "</p>";
	?>
</body>
</html>
