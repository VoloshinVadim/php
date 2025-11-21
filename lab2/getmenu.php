<?php declare(strict_types=1); 

/*
 ЗАДАНИЕ 2: Копируем массив $leftMenu из menu.php
*/
$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php'],
];

/*
 ЗАДАНИЕ 1, 2
 - Функция getMenu с параметрами и PHPDoc
*/

/**
 * Отрисовывает меню на основе переданного массива.
 *
 * @param array $menu Структура меню
 * @param bool $vertical Флаг ориентации меню (true - вертикально, false - горизонтально)
 * @return void Функция выводит HTML и ничего не возвращает
 */
function getMenu(array $menu, bool $vertical = true): void
{
    // Если $vertical == false, добавляем класс "horizontal", иначе класс пустой (вертикально по умолчанию)
    $class = $vertical ? '' : 'horizontal';

    echo "<ul class='menu {$class}'>";
    
    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    
    echo "</ul>";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню (Функция)</title>
	<style>
		.menu { list-style-type: none; margin: 0; padding: 0; background: #eee; display: inline-block; }
        /* Стили для горизонтального меню */
		.horizontal li { display: inline; padding: 10px; border-right: 1px solid #ccc; }
        /* Небольшой отступ для наглядности */
        .menu li { padding: 5px; } 
	</style>
</head>
<body>
	<h1>Меню</h1>
	<?php
	/*
	ЗАДАНИЕ 3
	- Вертикальное меню (второй параметр по умолчанию true)
	*/
    echo "<h3>Вертикальное:</h3>";
    getMenu($leftMenu); // Работает 1 параметр

	/*
	ЗАДАНИЕ 4
	- Горизонтальное меню
	*/
    echo "<br><h3>Горизонтальное:</h3>";
    getMenu($leftMenu, false); // Передаем false для горизонтального вывода
	?> 
</body>
</html>
