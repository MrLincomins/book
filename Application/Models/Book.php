<?php

namespace Application\Models;
use Application\Models\User;

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

    public function all1($offset, $size_page): array
    {
        $Status = (new User())->CheckLogin();
        If($Status !== 'Админ'){
            $sql = "SELECT * FROM {$this->table} WHERE count != 0 LIMIT :offset, :size_page";
        }
        else {
            $sql = "SELECT * FROM {$this->table} LIMIT :offset, :size_page";
        }
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['offset' => $offset, 'size_page' => $size_page]);
        return $stmt->fetchAll();
    }

    public function search(string $name): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE name LIKE :name";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['name' => $name]);
        return $stmt->fetchAll();
    }

    public function byYear(int $from,int $to): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE year >= :from and year <= :to";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['from' => $from, 'to' => $to]);
        return $stmt->fetchAll();
    }

    public function search_ISBN(int $ISBN): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE ISBN = :ISBN";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['ISBN' => $ISBN]);
        return $stmt->fetchAll();
    }

    public function add(string $Name,string $Author,int $Year,int $ISBN,int $count): array
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
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    public function searchid(string $id): array
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

    public function edit(string $Name,string $Author,int $Year,int $ISBN,int $newid,int $count): array
    {
      $sql = "UPDATE books SET Name = :Name, Author = :Author, ISBN = :ISBN, Year = :Year, count = :count WHERE newid = :newid";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(['Name' => $Name, 'Author' => $Author, 'ISBN' => $ISBN, 'Year' => $Year, 'count' => $count, 'newid' => $newid ]);
      return $stmt->fetchAll();
    }

    public function count(int $newid): array
    {
        $sql = "SELECT count FROM books WHERE newid = :newid";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['newid' => $newid]);
        return $stmt->fetchAll();
    }

    public function searchid1(string $ids): array
    {
        $sql = "SELECT * FROM books where newid IN(:ids)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['ids' => $ids]);
        return $stmt->fetchAll();
    }

    public function bookscount(): array
    {
        $sql = "SELECT COUNT(*) FROM books";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    public function one_books(): array
    {
        $sql = "SELECT * FROM books WHERE count <= 2 AND count != 0 LIMIT 0, 1";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }
}