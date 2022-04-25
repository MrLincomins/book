<?php

namespace App\Models;

/**
 * Класс автора.
 * Все данные об авторах из базы берем через этот класс
 */
class Author extends Model
{

    private $table = "authors";

    public function getTop100()
    {
    $sql = "SELECT Author, count(*) cnt FROM books GROUP BY Author ORDER BY cnt DESC LIMIT 100";
    $stmt = $this->connection->query($sql);
    return $stmt->fetchAll();

    }
    public function list()
    {
    $sql = "SELECT COUNT(*) AS cnt, Author FROM books GROUP BY Author";
    $stmt = $this->connection->query($sql);
    return $stmt->fetchAll();

    }


}
