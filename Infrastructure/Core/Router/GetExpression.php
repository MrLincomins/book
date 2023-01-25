<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

class GetExpression
{

    public function build(string $uri): ?array
    {
        $uri = urldecode($uri);
        preg_match_all("/\=([a-zA-Z0-9А-Яа-я()]+)/", $uri, $matchedParams, PREG_PATTERN_ORDER);

        array_shift($matchedParams);
        $matchedParams = $matchedParams[0];
        return @$matchedParams ?? null;
    }
}