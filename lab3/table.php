<?php
declare(strict_types=1);

// 1. Подключаем библиотеку и данные
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <?php require 'inc/top.inc.php'; ?>

  <section>
    <h1>Таблица умножения</h1>
    
    <!-- Форма отправляет данные сама на себя методом GET -->
    <form action='<?= $_SERVER['PHP_SELF'] ?>'>
      <label>Количество колонок: </label><br>
      <!-- Подставляем текущее значение value -->
      <input name='cols' type='text' value='<?= $cols ?>'><br>
      
      <label>Количество строк: </label><br>
      <input name='rows' type='text' value='<?= $rows ?>'><br>
      
      <label>Цвет: </label><br>
      <input name='color' type='color' value='<?= $color ?>' list="listColors">
      <datalist id="listColors">
        <option>#ff0000</option>
        <option>#00ff00</option>
        <option>#0000ff</option>
      </datalist>
      <br><br>
      <input type='submit' value='Создать'>
    </form>
    <br>

    <!-- Отрисовка таблицы через функцию -->
    <?php
        // Вызываем функцию getTable с параметрами из data.inc.php
        getTable($cols, $rows, $color);
    ?>
    
  </section>

  <?php require 'inc/menu.inc.php'; ?>
  <?php require 'inc/bottom.inc.php'; ?>

</body>
</html>
