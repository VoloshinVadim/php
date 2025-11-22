<?php
declare(strict_types=1);

/**
 * Отрисовывает таблицу умножения.
 * Была getTable, стала drawTable по требованию Лабы 4.
 */
function drawTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): void
{
    echo "<table border='1' width='200'>";
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $cols; $c++) {
            $val = $r * $c;
            if ($r === 1 || $c === 1) {
                echo "<th style='background-color:{$color}'>{$val}</th>";
            } else {
                echo "<td>{$val}</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

function getMenu(array $menu, bool $vertical = true): void
{
    $style = $vertical ? '' : 'display: inline; margin-right: 15px;';
    echo '<ul>';
    foreach ($menu as $item) {
        echo "<li style='{$style}'><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo '</ul>';
}
