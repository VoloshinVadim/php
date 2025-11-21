<?php
$result = null;
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $n2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $op = $_POST['operator'] ?? null;

    if ($n1 === false || $n2 === false) {
        $error = "Некорректные данные";
    } else {
        switch ($op) {
            case '+': $result = $n1 + $n2; break;
            case '-': $result = $n1 - $n2; break;
            case '*': $result = $n1 * $n2; break;
            case '/': 
                if($n2 == 0) $error = "Деление на 0!"; 
                else $result = $n1 / $n2; 
                break;
        }
    }
}
?>
<section>
    <?php if ($error): ?>
        <h3 style="color: red;"><?= $error ?></h3>
    <?php elseif ($result !== null): ?>
        <h3 style="color: green;">Результат: <?= $result ?></h3>
    <?php endif; ?>

    <form action="<?= $_SERVER['REQUEST_URI']?>" method="post">
      <label>Число 1:</label><br>
      <input name='num1' type='text' value="<?= $_POST['num1'] ?? '' ?>"><br>
      <label>Оператор: </label><br>
      <select name="operator">
        <option value="+" <?= ($_POST['operator'] ?? '') == '+' ? 'selected' : '' ?>>+</option>
        <option value="-" <?= ($_POST['operator'] ?? '') == '-' ? 'selected' : '' ?>>-</option>
        <option value="*" <?= ($_POST['operator'] ?? '') == '*' ? 'selected' : '' ?>>*</option>
        <option value="/" <?= ($_POST['operator'] ?? '') == '/' ? 'selected' : '' ?>>/</option>
      </select><br>
      <label>Число 2: </label><br>
      <input name='num2' type='text' value="<?= $_POST['num2'] ?? '' ?>"><br><br>
      <input type='submit' value='Считать'>
    </form>
</section>
