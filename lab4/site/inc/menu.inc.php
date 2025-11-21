<nav>
    <h2>Навигация по сайту</h2>
    <?php
    if (function_exists('getMenu')) {
        getMenu($leftMenu, true); 
    }
    ?>
</nav>
