<?php

namespace App\Models;

/**
 * Класс книги.
 * Все данные о книгах из базы берем через этот класс
 */
class Book extends Model
{
    private string $table = "books";


    public function all(): array
    {
        $sql = "SELECT * FROM {$this->table}";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll();
    }

    public function search($name): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE Name like %:name%";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['name' => $name]);

        return $stmt->fetchAll();
    }

    public function byYear($from, $to): array
    {

        $sql = "SELECT * FROM {$this->table} WHERE Year >= :from and Year <= :to";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['from' => $from, 'to' => $to]);

        return $stmt->fetchAll();
    }

    public function add($Name, $Author, $Year, $ISBN): array
    {
         $sql = "INSERT INTO books (Name, Author, Year, ISBN) VALUES (:Name, :Author, :Year, :ISBN)";
         $stmt = $this->connection->prepare($sql);
         $stmt->execute(['Name' => $Name, 'Author' => $Author, 'Year' => $Year, 'ISBN' => $ISBN]);

    }

    public function delete($id): array
    {
      $sql0 = "SELECT * FROM books where newid = :id";
      $sql = "DELETE FROM books WHERE newid = :id";
      $stmt = $this->connection->prepare($sql);
      $stmt0 = $this->connection->prepare($sql0);
      $stmt0->execute(['id' => $id]);
      $stmt->execute(['id' => $id]);
      return $stmt0->fetchAll();
    }

    public function edit($id, $Name, $Author, $Year, $ISBN): array
    {
      $sql1 = "SELECT * FROM books where newid = :id";
      $sql = "UPDATE books SET Name = :Name, Author = :Author, Year = :Year, ISBN = :ISBN WHERE newid = :id";
      $stmt1 = $this->connection->prepare($sql1);
      $stmt = $this->connection->prepare($sql);
      $stmt1->execute(['id' => $id]);
      $stmt->execute(['Name' => $Name, 'Author' => $Author, 'Year' => $Year, 'ISBN' => $ISBN, 'id' => $id]);
      return $stmt1->fetchAll();

    }






}
