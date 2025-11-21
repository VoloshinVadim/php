<?php
declare(strict_types=1);

/**
 * Скрипт загрузки изображений на сервер.
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файла на сервер</title>
</head>
 <body>
  <div>
   <?php
/*
 ЗАДАНИЕ
*/

// Проверьте, отправлялся ли файл на сервер (проверка по ключу fupload)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload'])) {
    
    $file = $_FILES['fupload'];

    // Проверяем код ошибки (0 - ошибок нет)
    if ($file['error'] === UPLOAD_ERR_OK) {
        
        // Получаем имя временного файла
        $tmpName = $file['tmp_name'];
        $originalName = htmlspecialchars($file['name']);
        $size = $file['size'];

        // Проверка типа файла через Fileinfo
        $mimeType = mime_content_type($tmpName);

        echo "<h3>Информация о файле:</h3>";
        echo "<ul>";
        echo "<li>Имя файла: $originalName</li>";
        echo "<li>Размер: $size байт</li>";
        echo "<li>Временное имя: $tmpName</li>";
        echo "<li>MIME-тип: $mimeType</li>";
        echo "</ul>";

        // Если загружен файл типа "image/jpeg"
        if ($mimeType === 'image/jpeg') {
            
            // Генерируем имя файла на основе MD5-хеша
            // md5_file считает хеш содержимого файла
            $newName = md5_file($tmpName) . '.jpg';
            $destination = 'upload/' . $newName;

            // Перемещаем файл
            if (move_uploaded_file($tmpName, $destination)) {
                echo "<h3 style='color:green'>Файл успешно загружен в папку upload!</h3>";
                echo "<p>Новое имя: $newName</p>";
                // Можно даже показать картинку
                echo "<img src='$destination' width='200'>";
            } else {
                echo "<h3 style='color:red'>Ошибка при перемещении файла. Проверьте права на папку upload.</h3>";
            }
        } else {
            echo "<h3 style='color:red'>Ошибка: Разрешена загрузка только JPG изображений!</h3>";
        }

    } else {
        echo "<h3 style='color:red'>Ошибка загрузки. Код ошибки: " . $file['error'] . "</h3>";
    }
}
   ?>

  </div>
  <!-- enctype="multipart/form-data" обязателен для загрузки файлов -->
  <form enctype="multipart/form-data"
        action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <p>
      <!-- Ограничение размера файла (1 Мб) -->
      <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
      <label>Выберите JPEG изображение:</label><br>
      <input type="file"   name="fupload"><br><br>
      <button type="submit">Загрузить</button>
    </p>
   </form>
 </body>
</html>
