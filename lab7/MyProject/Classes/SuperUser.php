<?php
declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Класс SuperUser описывает пользователя с правами администратора.
 * Наследуется от класса User.
 */
class SuperUser extends User
{
    /** @var string Роль пользователя */
    public string $role;

    /**
     * Конструктор супер-пользователя.
     * Принимает дополнительный параметр $role.
     *
     * @param string $name Имя
     * @param string $login Логин
     * @param string $password Пароль
     * @param string $role Роль
     */
    public function __construct(string $name, string $login, string $password, string $role)
    {
        // Вызываем конструктор родительского класса (User)
        parent::__construct($name, $login, $password);
        
        // Инициализируем собственное свойство
        $this->role = $role;
    }

    /**
     * Перегруженный метод вывода информации.
     * Добавляет вывод роли.
     *
     * @return void
     */
    public function showInfo(): void
    {
        // Вызываем метод родителя для вывода основных данных
        parent::showInfo();
        
        // Добавляем вывод роли
        echo "<p style='color: red;'>Role: <strong>{$this->role}</strong></p><hr>";
    }
}
