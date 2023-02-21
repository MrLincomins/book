<?php

namespace Infrastructure\Core\Repository;

use Application\Entities\BookRepository;
use Application\Entities\User;
use Application\Entities\UserRepository;
use JetBrains\PhpStorm\ArrayShape;

class MysqlUserRepository extends Repository implements UserRepository
{
    private string $table = "users";

    public function register($name, $status, $class, $password): array
    {
        $sql = "INSERT INTO {$this->table} (name, status, class, password) VALUES (:name, :status, :class, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['name' => $name, 'status' => $status, 'class' => $class, 'password' => $password]);
        return $stmt->fetchAll();
    }

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

    #[ArrayShape(["items" => "", "pagination" => "array"])] public function setPaginator(PaginatorInterface $paginator, $allItems): array
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

    public function auth($name, $class, $password): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE name = :name AND class = :class AND password = :password";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['name' => $name, 'class' => $class,'password' => $password]);
        return $stmt->fetchAll();
    }

    public function checkAuth($id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }
}
