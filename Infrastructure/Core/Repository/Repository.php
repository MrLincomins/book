<?php

namespace Infrastructure\Core\Repository;

use PDO;

/**
 * Базовая модель (entity), от нее будут наследоваться все модели.
 * Отвечает за создание соединия с базой данных и предоставления подключения моделям.
 */
abstract class Repository
{
    private string $host = 'book-mysql:3306';
    private string $user = 'root';
    private string $password = 'root';
    private string $database = 'books';
    private string $charset = "utf8";
    private array $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    protected PDO $connection;


    public function __construct()
    {
      $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
      $this->connection = new PDO($dsn, $this->user, $this->password, $this->options);
    }
}
