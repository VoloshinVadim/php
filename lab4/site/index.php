<?php
declare(strict_types=1);

// 1. Подключение библиотек
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

// 2. Логика приветствия (по времени суток)
$hour = (int)date('G');
if ($hour >= 0 && $hour < 6) $welcome = 'Доброй ночи';
elseif ($hour >= 6 && $hour < 12) $welcome = 'Доброе утро';
elseif ($hour >= 12 && $hour < 18) $welcome = 'Добрый день';
else $welcome = 'Добрый вечер';

// 3. Инициализация заголовков
$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";

// 4. Получение ID из адресной строки
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));

switch($id){ 
	case 'about':
		$title = 'О сайте';
		$header = 'О нашем сайте';
		break;
	case 'contact':
		$title = 'Контакты';
		$header = 'Обратная связь';
		break;
	case 'table':
		$title = 'Таблица умножения';
		$header = 'Таблица умножения';
		break;
	case 'calc':
		$title = 'Он-лайн калькулятор';
		$header = 'Калькулятор';
		break; 
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?=$title?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <?php require 'inc/top.inc.php'; ?>

  <!-- Заголовок, который меняется динамически -->
  <div style="margin-left: 16em;">
      <h1><?=$header?></h1>
  </div>

  <!-- Область основного контента -->
  <?php
    switch($id){
        case 'about': include 'about.php'; break;
        case 'contact': include 'contact.php'; break;
        case 'table': include 'table.php'; break;
        case 'calc': include 'calc.php'; break;
        default: include 'inc/index.inc.php'; 
    }
  ?>

  <?php require 'inc/menu.inc.php'; ?>
  <?php require 'inc/bottom.inc.php'; ?>

</body>
</html>
