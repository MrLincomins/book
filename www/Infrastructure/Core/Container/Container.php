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
        try {
            $reflection = new ReflectionClass($id);

            return $this->instances[$reflection->getName()];
        } catch (\Throwable $e) {
//            throw new ContainerRegistrationException();
        }
    }

    public function has(string $id): bool
    {
        try {
            $reflection = new ReflectionClass($id);

            return ! empty($this->instances[$reflection->getName()]);
        } catch (\Throwable $e) {
            throw new ContainerRegistrationException();
        }
    }

    public function register(string $class)
    {
        try {
            $reflection = new ReflectionClass($class);
            $this->instances[$reflection->getName()] =  $reflection->newInstance();

        } catch (\Throwable $e) {
            throw new ContainerRegistrationException();
        }
    }
}