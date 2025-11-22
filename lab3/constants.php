<?php
declare(strict_types=1);

/**
 * Лабораторная №3. Работа со встроенными функциями.
 * Вывод всех определенных констант.
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список констант PHP</title>
    <style>
        body { font-family: monospace; line-height: 1.5; padding: 20px; }
        .row { border-bottom: 1px solid #ddd; padding: 5px 0; }
        .key { color: #d63384; font-weight: bold; }
        .val { color: #0d6efd; }
    </style>
</head>
<body>
    <h1>Все определенные константы</h1>
    
    <?php
    // Получаем массив всех констант, сгруппированных по категориям
    // Но задание просит просто список, так что берем плоский список или перебираем все
    $constants = get_defined_constants(true);

    foreach ($constants as $category => $items) {
        echo "<h2>Категория: $category</h2>";
        
        foreach ($items as $name => $value) {
            // Приводим значение к строке для корректного отображения
            if (is_bool($value)) {
                $valStr = $value ? 'true' : 'false';
            } elseif (is_null($value)) {
                $valStr = 'null';
            } elseif (is_array($value)) {
                $valStr = 'Array';
            } else {
                // htmlspecialchars защищает от спецсимволов (например, если в константе HTML-код)
                $valStr = htmlspecialchars((string)$value);
            }

            echo "<div class='row'>
                    <span class='key'>$name</span> = <span class='val'>$valStr</span>
                  </div>";
        }
    }
    ?>
</body>
</html>
