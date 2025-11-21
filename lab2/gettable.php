<?php declare(strict_types=1); 

/*
 ЗАДАНИЕ 1, 4
 - Опишите функцию getTable() с параметрами по умолчанию и PHPDoc
*/

/**
 * Отрисовывает таблицу умножения заданного размера и цвета.
 *
 * @param int $cols Количество столбцов (по умолчанию 10)
 * @param int $rows Количество строк (по умолчанию 10)
 * @param string $color Цвет заголовков таблицы (по умолчанию 'yellow')
 * @return int Общее количество вызовов функции
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int 
{
    // Статическая переменная сохраняет значение между вызовами функции
    static $count = 0;
    $count++; // Увеличиваем счетчик вызовов

    /*
     ЗАДАНИЕ 2
     - Код отрисовки таблицы (скопирован из table.php и адаптирован)
    */
    echo "<table>";
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $cols; $c++) {
            $value = $r * $c;
            
            if ($r === 1 || $c === 1) {
                // Применяем цвет переданный в аргументе $color
                // style="background-color: ..." перебивает CSS в <head>
                echo "<th style='background-color: {$color}'>{$value}</th>";
            } else {
                echo "<td>{$value}</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table><br>"; // Добавил <br> для отступа между таблицами

    // Функция должна возвращать число вызовов
    return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения (Функция)</title>
	<style>
		table { border: 2px solid black; border-collapse: collapse; }
		th, td { padding: 10px; border: 1px solid black; }
        /* Цвет по умолчанию оставим желтым, но функция может его переопределить */
		th { background-color: yellow; font-weight: bold; text-align: center;}
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
	/*
	ЗАДАНИЕ 5
	*/
    
    // 1. Вызов без параметров (сработают значения по умолчанию: 10x10, желтый)
    getTable();

    // 2. Вызов с одним параметром (5 столбцов, строки 10, желтый)
    getTable(5);

    // 3. Вызов с двумя параметрами (5 столбцов, 5 строк, желтый)
    // Переменная $cnt сохранит результат возврата функции (число 3)
    $cnt = getTable(5, 5, 'green'); // Я добавил цвет для наглядности

    // Вывод общего числа вызовов
    echo "<p><strong>Функция getTable была вызвана $cnt раза.</strong></p>";
	?> 
</body>
</html>
