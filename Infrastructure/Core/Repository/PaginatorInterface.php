<?php

namespace Infrastructure\Core\Repository;

interface PaginatorInterface
{
    /**
     * Get pagination limit value.
     *
     * @return int
     */
    public function getLimit(): int;

    /**
     * Get calculated offset value.
     *
     * @return int
     */
    public function getOffset(): int;

    /**
     * Get parameter paginator depends on. Environment specific.
     *
     * @return null|string
     */
    public function getParameter();
}