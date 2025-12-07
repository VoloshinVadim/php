<?php
declare(strict_types=1);

/*
 ЗАДАНИЕ 2
 - Проверьте, существует ли массив в сессии
 - Выводите в цикле список всех посещённых страниц
*/

echo "<h3>Список посещённых страниц:</h3>";

if (isset($_SESSION['history']) && is_array($_SESSION['history'])) {
    echo "<ol>";
    foreach ($_SESSION['history'] as $page) {
        // htmlspecialchars защищает от XSS атак
        echo "<li>" . htmlspecialchars($page) . "</li>";
    }
    echo "</ol>";
} else {
    echo "<p>История пуста.</p>";
}
