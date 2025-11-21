<?php
declare(strict_types=1);

// Массив меню
$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php'],
];

// Инициализация переменных для таблицы умножения
// Если данные пришли из формы (через адресную строку), берем их. Иначе - значения по умолчанию.
$cols = isset($_GET['cols']) ? (int)$_GET['cols'] : 10;
$rows = isset($_GET['rows']) ? (int)$_GET['rows'] : 10;
$color = isset($_GET['color']) ? $_GET['color'] : '#ffff00';
