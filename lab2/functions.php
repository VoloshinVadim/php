<?php
declare(strict_types=1);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Работа с функциями (Дополнение)</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.5; }
        .code { font-family: monospace; background: #eee; padding: 2px 5px; }
        .result { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Дополнительные задания по функциям</h1>

    <?php
    // =========================================================
    // ЗАДАНИЕ 1: Анонимная функция $swap (обмен местами)
    // =========================================================
    echo "<h2>1. Функция swap (обмен по ссылке)</h2>";

    $swap = function (mixed &$a, mixed &$b): void {
        $temp = $a;
        $a = $b;
        $b = $temp;
    };

    // Данные для теста
    $a = 5;
    $b = 8;

    echo "<p><b>До вызова:</b> a = $a, b = $b</p>";

    // Вызываем функцию
    $swap($a, $b);

    echo "<p><b>После вызова:</b> a = $a, b = $b</p>";

    // Проверка
    if ($b === 5 && $a === 8) {
        echo "<p class='result'>Тест пройден успешно!</p>";
    } else {
        echo "<p style='color:red'>Ошибка!</p>";
    }


    // =========================================================
    // ЗАДАНИЕ 2: Функция map и стрелочная функция
    // =========================================================
    echo "<hr><h2>2. Функция map и callback</h2>";

    function map(array $items, callable $callback): array
    {
        $newArray = [];
        foreach ($items as $item) {
            // Вызываем переданную функцию
            $newArray[] = $callback($item);
        }
        return $newArray;
    }

    // Исходный массив
    $numbers = [1, 2, 3, 4, 5];
    echo "<p><b>Исходный массив:</b> [" . implode(', ', $numbers) . "]</p>";

    // Вызываем map со стрелочной функцией (возведение в квадрат)
    $squaredNumbers = map($numbers, fn(int $n): int => $n * $n);

    echo "<p><b>Результат (квадраты):</b> [" . implode(', ', $squaredNumbers) . "]</p>";
    ?>

</body>
</html>
