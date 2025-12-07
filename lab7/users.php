<?php
declare(strict_types=1);

/**
 * Основной скрипт для работы с пользователями.
 * Демонстрация ООП: классы, объекты, наследование, автозагрузка.
 */

// 1. Автозагрузка классов (вместо require)
spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';

    // Если файл существует, подключаем его
    if (file_exists($file)) {
        require_once $file;
    }
});

// 2. Импорт классов
use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №7 (ООП)</title>
    <style>body { font-family: sans-serif; padding: 20px; }</style>
</head>
<body>
    <h1>Лабораторная работа №7: ООП</h1>

    <h2>Обычные пользователи</h2>
    <?php
    // Создание объектов класса User
    $user1 = new User("Иван Иванов", "ivan", "111");
    $user2 = new User("Петр Петров", "petr", "222");
    $user3 = new User("Сидор Сидоров", "sid", "333");

    // Вывод информации
    $user1->showInfo();
    $user2->showInfo();
    $user3->showInfo();
    ?>

    <h2>Супер-пользователь (Админ)</h2>
    <?php
    // Создание объекта класса SuperUser
    $admin = new SuperUser("Админ Админов", "admin", "0000", "administrator");
    
    // Вывод информации (с ролью)
    $admin->showInfo();
    ?>

    <h2>Лог работы деструкторов:</h2>
    <!-- Деструкторы сработают здесь автоматически при завершении скрипта -->
</body>
</html>
