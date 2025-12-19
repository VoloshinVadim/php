<?php
declare(strict_types=1);

error_reporting(E_ALL & ~E_DEPRECATED);

ini_set("session.use_only_cookies", "1"); 
ini_set("session.use_trans_sid", "0");    

session_start();
include('savepage.inc.php');
?>
<!doctype html>

<html>
<head>
	<meta charset="utf-8">
	<title>Страница 1</title>
</head>
<body>

<h1>Страница 1</h1>

<?php
// Подключаем меню
include('menu.inc.php');

// Подключаем вывод истории
include('visited.inc.php');
?>

</body>
</html>
