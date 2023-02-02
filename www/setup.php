<?php

use Infrastructure\Core\Repository\Repository;

class makeBd
{
    private string $host = 'book-mysql:3306';
    private string $user = 'Author';
    private string $password = 'password';
    private string $database = 'book';
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


    public function checkForBd(): bool
    {
        $query = "SHOW TABLES FROM book";
        $stmt = $this->connection->query($query);
        if (!empty($stmt->fetchAll())) {
            return true;
        } else {
            return false;
        }
    }

    public function createBd(): void
    {
        exec('mysqldump --user=Author --password=password --host=book-mysql:3306 DB_NAME > sql_bd.sql');
    }
}

$bd = new makeBd();
if ($bd->checkForBd()) {
    print('База данных уже есть');
} else {
    $bd->createBd();
    print('Готово');
}
exit;