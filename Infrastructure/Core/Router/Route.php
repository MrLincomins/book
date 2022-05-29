<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

final class Route
{
    public function __construct(
        public string $method,
        public string $pattern,
        public string $handler
    ) {
    }
}