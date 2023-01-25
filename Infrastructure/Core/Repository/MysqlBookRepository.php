<?php

namespace Infrastructure\Core\Repository;

use Application\Entities\Book;
use Application\Entities\BookRepository;

class MysqlBookRepository extends Repository implements BookRepository
{
    private string $table = "books";

    public function paginate($perPage, $withPage, $items): array
    {
        $countItems = count($items);
        $paginator = new Paginator(
            $perPage,
            $withPage,
            $countItems
        );
        $setPaginator = $this->setPaginator($paginator, $items);
        return [
            $this->getPaginator($setPaginator),
            $setPaginator
        ];
    }

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
                $row["count"],
                $row["genre"],
                $row["picture"]
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
            $row["count"],
            $row["genre"],
            $row["picture"]
        );
    }

    public function create(string $name, string $author, string $year, string $ISBN, string $count, string $genre, string $picture): array
    {
        $query = "INSERT INTO {$this->table} (Name, Author, Year, ISBN, count, genre, picture) VALUES (:name, :author, :year, :ISBN, :count, :genre, :picture)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['name' => $name, 'author' => $author, 'year' => $year, 'ISBN' => $ISBN, 'count' => $count, 'genre' => $genre, 'picture' => $picture]);
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
                $row["count"],
                $row["genre"],
                $row["picture"]
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
            new Book(1, "Не помню как вы говорили делать", $row["Author"], 123456789, 2000, $row["books_count"], 1, 1)
            );
        }, $result);
    }

    public function edit(string $id, string $name, string $author, string $year, string $ISBN, string $count, string $genre): array
    {
        $query = "UPDATE books SET Name = :Name, Author = :Author, ISBN = :ISBN, Year = :Year, count = :count, genre = :genre WHERE newid = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['Name' => $name, 'Author' => $author, 'ISBN' => $ISBN, 'Year' => $year, 'count' => $count, 'genre' => $genre, 'id' => $id]);
        return $stmt->fetchAll();
    }

    public function findGenre(string $id): array
    {
        $query = "SELECT * FROM genre WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function allGenres(): array
    {
        $query = "SELECT * FROM genre";
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll();
    }

    public function addGenre(string $genre): array
    {
        $query = "INSERT INTO genre (genre) VALUES (:genre)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['genre' => $genre]);
        return $stmt->fetchAll();
    }

    public function deleteGenre(string $id): array
    {
        $query = "DELETE FROM genre WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function editGenre(string $id, string $genre): array
    {
        $query = "UPDATE genre SET genre = :genre WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['genre' => $genre, 'id' => $id]);
        return $stmt->fetchAll();
    }

    public function search(string $name): array
    {
        $pattern = '%' . $name . '%';
        $query = "SELECT * FROM books WHERE name LIKE :name;";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['name' => $pattern]);
        return array_map(function (array $row) {
            return new Book(
                $row["newid"],
                $row["Name"],
                $row["Author"],
                $row["ISBN"],
                $row["Year"],
                $row["count"],
                $row["genre"],
                $row["picture"]
            );
        }, $stmt->fetchAll());
    }

    public function hasPaginator(): bool
    {
        // TODO: Implement hasPaginator() method.
    }

    public function setPaginator(PaginatorInterface $paginator, $allItems): array
    {
        return [
            "items" => $allItems,
            "pagination" => [
                "currentPage" => $paginator->withPage,
                "lastPage" => $paginator->getLimit(),
                "perPage" => $paginator->perPage,
                "countItems" => $paginator->countItems,
                "offset" => $paginator->getOffset()
            ]
        ];
        // TODO: Implement setPaginator() method.
    }

    public function getPaginator($setPaginator): array
    {
        $offset = $setPaginator['pagination']['offset'];
        $perPage = $setPaginator['pagination']['perPage'];
        return array_slice($setPaginator['items'], $offset, $perPage);
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
