<?php

namespace Infrastructure\Core\Repository;

interface PaginatorAwareInterface
{
    /**
     * Indication that object has associated paginator.
     *
     * @return bool
     */
    public function hasPaginator(): bool;

    /**
     * Manually set paginator instance for specific object.
     *
     * @param PaginatorInterface $paginator
     */
    public function setPaginator(PaginatorInterface $paginator);

    /**
     * Get paginator for the current selection. Paginate method should be already called or
     * paginator must be previously set.
     *
     * Potentially to be renamed to getPaginator method since this method does not create paginator
     * automatically.
     *
     * @see paginate()
     *
     * @return PaginatorInterface
     *
     * @throws PaginationException
     */
    public function getPaginator(): PaginatorInterface;
}