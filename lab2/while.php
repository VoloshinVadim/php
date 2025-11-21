<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Цикл while</title>
</head>
<body>
	<h1>Цикл while</h1>
	<?php
	/*
	ЗАДАНИЕ
	- Создайте переменную $var и присвойте ей строковое значение 'ПРИВЕТ'
	*/
    $var = 'ПРИВЕТ';
    
    // Узнаем длину строки (для русских букв используем mb_strlen)
    $len = mb_strlen($var); 
    $i = 0;

    /*
	- Используя цикл while выведите значение переменной...
	*/
    while ($i < $len) {
        // mb_substr "вырезает" 1 букву c позиции $i
        echo mb_substr($var, $i, 1) . "<br>";
        $i++; // Увеличиваем счетчик
    }
	?> 
</body>
</html>
