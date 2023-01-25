<?php

namespace Infrastructure\Core\Repository;

class Paginator implements PaginatorInterface
{
    public int $perPage; // кол-во данных на странице
    public int $withPage; // данная страница
    public int $countItems; // Кол-во строк в массиве

    public function __construct($perPage, $withPage, $countItems)
    {
        $this->perPage = $perPage;
        $this->withPage = $withPage;
        $this->countItems = $countItems;
    }

    public function getLimit(): int
    {
        return ceil($this->countItems / $this->perPage);
    }

    public function getOffset(): int
    {
         return ($this->withPage - 1) * $this->perPage;
    }

    public function getParameter()
    {
        // TODO: Implement getParameter() method.
        // что это??
    }
}