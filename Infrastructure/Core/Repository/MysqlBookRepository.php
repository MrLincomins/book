<?php

namespace Infrastructure\Core\Repository;

use Application\Entities\Book;
use Application\Entities\BookRepository;

class MysqlBookRepository extends Repository implements BookRepository
{
    private string $table = "books";


    public function all(): array
    {
        $query = "SELECT * FROM {$this->table}";

        $stmt = $this->connection->query($query);

        $result = $stmt->fetchAll();

        return array_map(function (array $row) {
            return new Book(
                $row["newid"],
                $row["Name"],
                $row["Author"],
                $row["ISBN"],
                $row["Year"],
                $row["count"]
            );
        }, $result);
    }

    public function getById($id): ?Book
    {
        $query = "SELECT * FROM {$this->table} WHERE newid = :id";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return new Book(
            $row["newid"],
            $row["Name"],
            $row["Author"],
            $row["ISBN"],
            $row["Year"],
            $row["count"]
        );
    }

    public function create(string $name, string $author, string $year, string $ISBN, string $count): array
    {
        $query = "INSERT INTO {$this->table} (Name, Author, Year, ISBN, count) VALUES (:name, :author, :year, :ISBN, :count)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['name' => $name, 'author' => $author, 'year' => $year, 'ISBN' => $ISBN, 'count' => $count]);
        return $stmt->fetchAll();

    }

    public function findOne(array $attributes): ?Book
    {
        // TODO: Implement findOne() method;
    }

    public
    function findMany(array $attributes): array
    {
        // TODO: Implement findMany() method.
    }

    public function delete($id): array
    {
        $query = "DELETE FROM books WHERE newid = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function tooYear($too, $from): array
    {
        $query = "SELECT * FROM {$this->table} WHERE year >= :from and year <= :too";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['from' => $from, 'too' => $too]);
        $result = $stmt->fetchAll();
        return array_map(function (array $row) {
            return new Book(
                $row["newid"],
                $row["Name"],
                $row["Author"],
                $row["ISBN"],
                $row["Year"],
                $row["count"]
            );
        }, $result);
    }

    public function top100(): array
    {
        $query = "SELECT Author, count(*) books_count FROM books GROUP BY Author ORDER BY books_count DESC LIMIT 100";
        $stmt = $this->connection->query($query);
        $result = $stmt->fetchAll();
        return array_map(function (array $row) {
            return (
            new Book(1, "Не помню как вы говорили делать", $row["Author"], 123456789, 2000, $row["books_count"])
        );
        }, $result);
    }

    public function edit(string $id, string $name, string $author, string $year, string $ISBN, string $count): array
    {
        $query = "UPDATE books SET Name = :Name, Author = :Author, ISBN = :ISBN, Year = :Year, count = :count WHERE newid = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['Name' => $name, 'Author' => $author, 'ISBN' => $ISBN, 'Year' => $year, 'count' => $count, 'id' => $id ]);
        return $stmt->fetchAll();
    }

}

//        if(empty($book)){
//            $sql1 = "INSERT INTO {$this->table} (Name, Author, Year, ISBN, count) VALUES (:Name, :Author, :Year, :ISBN, :count)";
//            $stmt1 = $this->connection->prepare($sql1);
//            $stmt1->execute(['Name' => $Name, 'Author' => $Author, 'Year' => $Year, 'ISBN' => $ISBN, 'count' => $count]);
//            return $stmt1->fetchAll();
//        }
//        else{
//            $sql = "UPDATE {$this->table} SET count = count + :count WHERE ISBN = :ISBN";
//            $stmt = $this->connection->prepare($sql);
//            $stmt->execute(['count' => $count, 'ISBN' => $ISBN]);
//            return $stmt->fetchAll();
//        }
