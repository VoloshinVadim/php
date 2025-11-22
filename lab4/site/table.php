<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$cols = abs((int) $_POST['cols']);
	$rows = abs((int) $_POST['rows']);
	$color = trim(strip_tags($_POST['color']));
}
// Условие сокращенной записи из задания: ($cols) ? $cols : 10;
$cols = ($cols ?? false) ? $cols : 10;
$rows = ($rows ?? false) ? $rows : 10;
$color = ($color ?? false) ? $color : '#ffff00';
?>
<section>
    
    <!-- Action должен быть REQUEST_URI, чтобы сохранить параметр ?id=table -->
    <form action='<?= $_SERVER['REQUEST_URI']?>' method="POST">
      <label>Количество колонок: </label><br>
      <input name='cols' type='text' value='<?= $cols ?>'><br>
      
      <label>Количество строк: </label><br>
      <input name='rows' type='text' value='<?= $rows ?>'><br>
      
      <label>Цвет: </label><br>
      <input name='color' type='color' value='<?= $color ?>' list="listColors">
      <datalist id="listColors">
        <option>#ff0000</option>
        <option>#00ff00</option>
        <option>#0000ff</option>
      </datalist>
      <br><br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <?php 
        // Вызов функции строго как в задании: drawTable
        drawTable($cols, $rows, $color); 
    ?>
    <!-- Таблица -->
</section>
