<?php
declare(strict_types=1);

/*
 ЗАДАНИЕ 1
 - Создайте в сессии массив для хранения всех посещенных страниц
 - Сохраните в него текущую страницу
*/


// Проверяем, существует ли уже массив history в сессии. Если нет — создаем.
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

// Добавляем текущий адрес ($_SERVER['REQUEST_URI']) в массив
// $_SERVER['REQUEST_URI'] содержит имя файла, например '/lab6/page1.php'
$_SESSION['history'][] = $_SERVER['REQUEST_URI'];
