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
	<title>Загрузка файла на сервер</title>
</head>
 <body>
  <div>
   <?php
/*
 ЗАДАНИЕ
*/
// Проверьте, отправлялся ли файл на сервер
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload'])) {
    
    $file = $_FILES['fupload'];

    // Проверяем код ошибки
    if ($file['error'] === UPLOAD_ERR_OK) {
        
        $tmpName = $file['tmp_name'];
        $originalName = htmlspecialchars($file['name']);
        $size = $file['size'];

        // Проверка типа файла через mime_content_type
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
            
            // Генерируем имя файла (MD5 хеш)
            $newName = md5_file($tmpName) . '.jpg';
            $destination = 'upload/' . $newName;

            // Перемещаем файл
            if (move_uploaded_file($tmpName, $destination)) {
                echo "<h3 style='color:green'>Файл успешно загружен!</h3>";
                echo "<p>Сохранен как: $newName</p>";
                echo "<img src='$destination' width='200' alt='Загруженное фото'>";
            } else {
                echo "<h3 style='color:red'>Ошибка при перемещении файла.</h3>";
            }
        } else {
            echo "<h3 style='color:red'>Ошибка: Разрешена загрузка только JPG!</h3>";
        }

    } else {
        echo "<h3 style='color:red'>Ошибка загрузки. Код: " . $file['error'] . "</h3>";
    }
}
   ?>

  </div>
  
  <form enctype="multipart/form-data"
        action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
      <label>Выберите JPEG изображение:</label><br>
      <input type="file"   name="fupload"><br><br>
      <button type="submit">Загрузить</button>
    </p>
   </form>
 </body>
</html>
