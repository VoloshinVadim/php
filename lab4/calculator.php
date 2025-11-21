<?php
declare(strict_types=1);

/**
 * Скрипт простейшего калькулятора (самостоятельный файл).
 */

$result = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Фильтрация данных
    $n1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $n2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = $_POST['operator'] ?? null;

    if ($n1 === false || $n2 === false) {
        $error = "Ошибка: Введите корректные числа!";
    } else {
        switch ($operator) {
            case '+': $result = $n1 + $n2; break;
            case '-': $result = $n1 - $n2; break;
            case '*': $result = $n1 * $n2; break;
            case '/': 
                if ($n2 == 0) $error = "На ноль делить нельзя!";
                else $result = $n1 / $n2; 
                break;
            default: $error = "Неверный оператор";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Калькулятор (Отдельный)</title>
</head>
<body>
    <h1>Калькулятор</h1>
    
    <?php if ($error): ?>
        <h2 style="color: red;"><?= $error ?></h2>
    <?php elseif ($result !== null): ?>
        <h2 style="color: green;">Результат: <?= $result ?></h2>
    <?php endif; ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p>
            <label>Число 1:</label><br>
            <input type="text" name="num1" required value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>">
        </p>
        <p>
            <label>Оператор:</label><br>
            <select name="operator">
                <option value="+" <?= ($_POST['operator'] ?? '') == '+' ? 'selected' : '' ?>>+</option>
                <option value="-" <?= ($_POST['operator'] ?? '') == '-' ? 'selected' : '' ?>>-</option>
                <option value="*" <?= ($_POST['operator'] ?? '') == '*' ? 'selected' : '' ?>>*</option>
                <option value="/" <?= ($_POST['operator'] ?? '') == '/' ? 'selected' : '' ?>>/</option>
            </select>
        </p>
        <p>
            <label>Число 2:</label><br>
            <input type="text" name="num2" required value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>">
        </p>
        <button type="submit">Считать!</button>
    </form>
</body>
</html>
