<?php
declare(strict_types=1);

/**
 * Лабораторная №3. Работа со встроенными функциями.
 * Вывод списка загруженных расширений и их функций.
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список функций PHP</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        h2 { background-color: #f0f0f0; padding: 10px; border-left: 5px solid #333; margin-top: 20px; }
        .func-list { font-family: monospace; font-size: 12px; color: #555; margin-left: 20px; }
        .summary { font-size: 18px; font-weight: bold; color: green; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Информация о расширениях и функциях</h1>

    <?php
    // 1. Получаем список всех загруженных расширений
    $extensions = get_loaded_extensions();
    
    // Переменная для подсчета общего числа функций
    $totalFunctions = 0;

    // Перебираем каждое расширение
    foreach ($extensions as $ext) {
        echo "<h2>Модуль: $ext</h2>";

        // 2. Получаем массив функций для конкретного расширения
        // Функция может вернуть false, если у расширения нет функций
        $functions = get_extension_funcs($ext);

        if (is_array($functions)) {
            $count = count($functions);
            $totalFunctions += $count;

            echo "<p>Количество функций: <strong>$count</strong></p>";
            echo "<div class='func-list'>";
            // Выводим функции через запятую
            echo implode(', ', $functions);
            echo "</div>";
        } else {
            echo "<p><em>В этом модуле нет доступных функций.</em></p>";
        }
    }
    ?>

    <hr>
    <div class="summary">
        ИТОГО: Всего найдено функций в PHP: <?= $totalFunctions ?>
    </div>

</body>
</html>
