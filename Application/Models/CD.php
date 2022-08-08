<?php

namespace Application\Models;

/**
 * Класс дисков.
 * Все данные о дисках из базы берем через этот класс
 */
class CD extends Model
{
    private $table = "disks";

    public function all(): array
    {
        $sql = "SELECT * FROM disks";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll();
    }

    public function add(string $Name,string $Author,int $Code,string     $Description): array
    {
        $sql = "INSERT INTO {$this->table} (Name, Author, Code, Description) VALUES (:Name, :Author, :Code, :Description)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['Name' => $Name, 'Author' => $Author, 'Code' => $Code, 'Description' => $Description]);
        return $stmt->fetchAll();
    }
}
