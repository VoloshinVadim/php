<?php declare(strict_types=1); 
	/*
	ЗАДАНИЕ 1
	- Создайте две целочисленные переменные $cols и $rows
	*/
    $cols = 10; // Количество столбцов
    $rows = 10; // Количество строк
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table { border: 2px solid black; border-collapse: collapse; }
		th, td { padding: 10px; border: 1px solid black; }
		th { background-color: yellow; font-weight: bold; text-align: center; }
	</style>
</head>
<body>
	<h1>Таблица умножения</h1>
    
    <!-- Начало таблицы -->
    <table>
	<?php
	/*
	ЗАДАНИЕ 2 и 3
    - Отрисовка таблицы.
    - Первая строка и первый столбец - жирные и желтые (тег th).
	*/
    
    // Внешний цикл создает строки (tr)
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        
        // Внутренний цикл создает ячейки внутри строки
        for ($c = 1; $c <= $cols; $c++) {
            // Вычисляем значение
            $value = $r * $c;
            
            // Если это первая строка ИЛИ первый столбец — используем <th> (заголовок)
            // Иначе используем <td> (обычная ячейка)
            if ($r === 1 || $c === 1) {
                echo "<th>{$value}</th>";
            } else {
                echo "<td>{$value}</td>";
            }
        }
        
        echo "</tr>";
    }
	?> 
    </table>
</body>
</html>
