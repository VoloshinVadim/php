<?php
declare(strict_types=1);
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Контакты</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <?php require 'inc/top.inc.php'; ?>

  <section>
    <h1>Обратная связь</h1>
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    
    <h3>Задайте вопрос</h3>
    <form action='' method='post'>
      <label>Тема письма: </label><br>
      <input name='subject' type='text' size="50"><br>
      
      <label>Содержание: </label><br>
      <textarea name='body' cols="50" rows="10"></textarea><br><br>
      
      <input type='submit' value='Отправить'>
    </form>
  </section>

  <?php require 'inc/menu.inc.php'; ?>
  <?php require 'inc/bottom.inc.php'; ?>

</body>
</html>
