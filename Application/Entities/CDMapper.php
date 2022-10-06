<?php

namespace Application\Entities;

use Infrastructure\Core\Repository\Repository;

class CDMapper extends Repository
{
    private $table = "disks";

    public function all(): array
    {
        $sql = "SELECT * FROM disks";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll();
    }

    public function add($disk): array
    {
        $sql = "INSERT INTO {$this->table} (Name, Author, Code, Description) VALUES (:Name, :Author, :Code, :Description)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['Name' => $disk->name, 'Author' => $disk->author, 'Code' => $disk->code, 'Description' => $disk->description]);
        return $stmt->fetchAll();
    }
}