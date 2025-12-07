<?php
declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Класс User описывает обычного пользователя системы.
 */
class User
{
    /** @var string Имя пользователя */
    public string $name;

    /** @var string Логин пользователя */
    public string $login;

    /** @var string Пароль пользователя (закрытое свойство) */
    private string $password;

    /**
     * Конструктор класса.
     * Инициализирует свойства при создании объекта.
     *
     * @param string $name Имя
     * @param string $login Логин
     * @param string $password Пароль
     */
    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * Выводит информацию о пользователе.
     *
     * @return void
     */
    public function showInfo(): void
    {
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 5px;'>";
        echo "<p>Name: <strong>{$this->name}</strong></p>";
        echo "<p>Login: <strong>{$this->login}</strong></p>";
        // Пароль приватный, но внутри класса мы его видим
        echo "<p>Pass: " . str_repeat("*", strlen($this->password)) . "</p>"; 
        echo "</div>";
    }

    /**
     * Деструктор класса.
     * Срабатывает автоматически при удалении объекта.
     */
    public function __destruct()
    {
        echo "<p>Пользователь <strong>{$this->login}</strong> удален.</p>";
    }
}
