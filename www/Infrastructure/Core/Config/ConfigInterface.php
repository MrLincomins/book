<?php

declare(strict_types=1);

namespace Infrastructure\Core\Config;

interface ConfigInterface
{
    public function has(string $code): bool;

    public function get(string $code): mixed;

}