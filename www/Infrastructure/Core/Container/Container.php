<?php

declare(strict_types=1);

namespace Infrastructure\Core\Container;

use Psr\Container\ContainerInterface;
use ReflectionClass;

final class Container implements ContainerInterface
{

    /** @var object[] */
    private array $instances = [];

    public function get(string $id)
    {
        $reflection = new ReflectionClass($id);

        return $this->instances[$reflection->getName()];

    }

    public function has(string $id): bool
    {
        $reflection = new ReflectionClass($id);

        return !empty($this->instances[$reflection->getName()]);
    }

    public function register(string $class)
    {
        $reflection = new ReflectionClass($class);
        $this->instances[$reflection->getName()] = $reflection->newInstance();

    }
}