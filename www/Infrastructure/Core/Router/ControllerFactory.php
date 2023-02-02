<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

use Psr\Container\ContainerInterface;

final class ControllerFactory
{
    public static function build(Route $route, ContainerInterface $container): array
    {
        [$controller, $action] = explode("@", $route->handler);
        $fullControllerName = 'Application\Controllers\\' . $controller;
        $controllerInstance = new $fullControllerName($container);

        return [
            $controllerInstance,
            $action,
        ];
    }
}