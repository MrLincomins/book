<?php

namespace Application\Models;

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
        $sql = "SELECT * FROM {$this->table} WHERE name like %:name%";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['name' => $name]);
        return $stmt->fetchAll();
    }

    public function byYear($from, $to): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE year >= :from and year <= :to";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['from' => $from, 'to' => $to]);
        return $stmt->fetchAll();
    }

    public function search_ISBN($ISBN): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE ISBN = :ISBN";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['ISBN' => $ISBN]);
        return $stmt->fetchAll();
    }

    public function add($Name, $Author, $Year, $ISBN, $count): array
    {
        $book = (new Book())->search_ISBN($ISBN);
        if(empty($book)){
            $sql1 = "INSERT INTO {$this->table} (Name, Author, Year, ISBN, count) VALUES (:Name, :Author, :Year, :ISBN, :count)";
            $stmt1 = $this->connection->prepare($sql1);
            $stmt1->execute(['Name' => $Name, 'Author' => $Author, 'Year' => $Year, 'ISBN' => $ISBN, 'count' => $count]);
            return $stmt1->fetchAll();
        }
        else{
            $sql = "UPDATE {$this->table} SET count = count + :count WHERE ISBN = :ISBN";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(['count' => $count, 'ISBN' => $ISBN]);
            return $stmt->fetchAll();
        }
    }



    public function Top100(): array
    {
        $sql = "SELECT Author, count(*) books_count FROM books GROUP BY Author ORDER BY books_count DESC LIMIT 100";
        $stmt = $this->connection->query($sql);;
        return $stmt->fetchAll();

    }

    public function searchid($id): array
    {
      $sql = "SELECT * FROM books where newid = :id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->fetchAll();

    }

    public function delete($id): array
    {
      $sql = "DELETE FROM books WHERE newid = :id";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->fetchAll();
    }

    public function edit($Name, $Author, $Year, $ISBN, $newid, $count): array
    {
      $sql = "UPDATE books SET Name = :Name, Author = :Author, ISBN = :ISBN, Year = :Year, count = :count WHERE newid = :newid";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(['Name' => $Name, 'Author' => $Author, 'ISBN' => $ISBN, 'Year' => $Year, 'count' => $count, 'newid' => $newid ]);
      return $stmt->fetchAll();
    }





}
