<nav>
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <?php
    // Вызываем функцию отрисовки меню. 
    // Переменная $leftMenu доступна, так как data.inc.php будет подключен раньше.
    if (function_exists('getMenu')) {
        getMenu($leftMenu, true); 
    }
    ?>
    <!-- Меню -->
</nav>
