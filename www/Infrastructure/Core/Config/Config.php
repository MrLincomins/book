<?php

declare(strict_types=1);

namespace Infrastructure\Core\Config;

use Psr\Container\ContainerInterface;

final class Config implements ContainerInterface
{

    public function get(string $id)
    {
        // TODO: Implement get() method.
    }

    public function has(string $id): bool
    {
        // TODO: Implement has() method.
    }
}