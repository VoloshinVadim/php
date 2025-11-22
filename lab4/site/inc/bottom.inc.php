<footer>
    <!-- Нижняя часть страницы -->
    <?php 
        $dateArray = getdate(); // Используем getdate, как просили
        $year = $dateArray['year'];
    ?>
    &copy; Супер Мега Веб-мастер, 2000 &ndash; <?= $year ?>
    <!-- Нижняя часть страницы -->
</footer>
