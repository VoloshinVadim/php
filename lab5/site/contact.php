<?php
/*
 * Файл contact.php (фрагмент для index.php)
 * Реализует отправку почты.
 */

$msg = '';
$messageSent = false;

// Проверить, была ли форма отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Фильтрация
    $subject = trim(strip_tags($_POST['subject'] ?? ''));
    $body = trim(strip_tags($_POST['body'] ?? ''));
    
    // ВАЖНО: Укажи здесь свой email
    $to = 'vadim.voloshin.228@mail.ru'; 

    // Дополнительные заголовки по заданию
    $headers = "From: admin@center.ogu\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";

    // Отправка письма
    if ($subject !== '' && $body !== '') {
        if (mail($to, $subject, $body, $headers)) {
            $messageSent = true;
            $msg = "Сообщение отправлено!";
        } else {
            $msg = "Ошибка отправки почты.";
        }
    } else {
        $msg = "Заполните все поля!";
    }
}
?>

<section>
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    
    <h3>Задайте вопрос</h3>
    
    <?php if ($msg): ?>
        <h3 style="color: <?= $messageSent ? 'green' : 'red' ?>"><?= $msg ?></h3>
    <?php endif; ?>

    <form action='' method='post'>
      <label>Тема письма: </label><br>
      <input name='subject' type='text' size="50" required><br>
      
      <label>Содержание: </label><br>
      <textarea name='body' cols="50" rows="10" required></textarea><br><br>
      
      <input type='submit' value='Отправить'>
    </form>
</section>
