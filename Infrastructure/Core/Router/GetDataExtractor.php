<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

final class GetDataExtractor
{

    public function get(string $uri): array|null
    {
        preg_match_all("/(\?[\w]+|\&[\w]+)/", $uri, $wildCardsList, PREG_PATTERN_ORDER);
        array_shift($wildCardsList);
        //Перевести в стринг
        return str_replace(["?", "&"], "", $wildCardsList[0]);

    }
}