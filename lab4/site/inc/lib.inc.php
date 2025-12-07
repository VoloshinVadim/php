<?php
declare(strict_types=1);

/**
 * @param int $cols Количество столбцов
 * @param int $rows Количество строк
 * @param string $color Цвет заголовков
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): void
{
    // ИСПОЛЬЗУЕМ CSS вместо border='1' width='200'
    echo "<table style='border-collapse: collapse; border: 1px solid black; width: 200px;'>";
    
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $cols; $c++) {
            $val = $r * $c;
            
            // Стили для ячеек тоже задаем через CSS
            $style = "padding: 5px; border: 1px solid black;";
            
            if ($r === 1 || $c === 1) {
                echo "<th style='{$style} background-color:{$color}'>{$val}</th>";
            } else {
                echo "<td style='{$style}'>{$val}</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * Отрисовывает меню.
 */
function getMenu(array $menu, bool $vertical = true): void
{
    $style = $vertical ? '' : 'display: inline; margin-right: 15px;';
    echo '<ul>';
    foreach ($menu as $item) {
        echo "<li style='{$style}'><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo '</ul>';
}
