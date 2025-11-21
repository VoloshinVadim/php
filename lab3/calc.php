<?php
declare(strict_types=1);
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Калькулятор</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <?php require 'inc/top.inc.php'; ?>

  <section>
    <h1>Калькулятор школьника</h1>
    
    <?php
    // Простая логика калькулятора
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n1 = (float)($_POST['num1'] ?? 0);
        $n2 = (float)($_POST['num2'] ?? 0);
        $op = $_POST['operator'] ?? '+';

        switch ($op) {
            case '+': $result = $n1 + $n2; break;
            case '-': $result = $n1 - $n2; break;
            case '*': $result = $n1 * $n2; break;
            case '/': $result = $n2 != 0 ? $n1 / $n2 : 'Ошибка (деление на 0)'; break;
            default: $result = 'Неверная операция';
        }
    }
    ?>

    <form action='' method="POST">
      <label>Число 1:</label><br>
      <input name='num1' type='text'><br>
      
      <label>Оператор (+, -, *, /): </label><br>
      <input name='operator' type='text'><br>
      
      <label>Число 2: </label><br>
      <input name='num2' type='text'><br><br>
      
      <input type='submit' value='Считать'>
    </form>

    <?php if ($result !== ''): ?>
        <h3>Результат: <?= $result ?></h3>
    <?php endif; ?>

  </section>

  <?php require 'inc/menu.inc.php'; ?>
  <?php require 'inc/bottom.inc.php'; ?>

</body>
</html>
