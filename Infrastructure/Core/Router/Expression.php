<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

class Expression
{

    public function build(string $uri): string
    {
        $placeholder = str_replace("/", "\/", $uri);
        $placeholder = preg_replace("/\{(\w+)\}/", "(\d+|\w+)", $placeholder);

        return "/" . $placeholder . ".*$/";
    }
}