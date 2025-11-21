<?php
declare(strict_types=1);

// Подключение библиотек и данных
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сайт нашей школы</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <?php 
    // Подключение шапки
    require 'inc/top.inc.php'; 
  ?>

  <?php 
    // Подключение основного контента
    require 'inc/index.inc.php'; 
  ?>

  <?php 
    // Подключение меню
    require 'inc/menu.inc.php'; 
  ?>

  <?php 
    // Подключение подвала
    require 'inc/bottom.inc.php'; 
  ?>

</body>
</html>
