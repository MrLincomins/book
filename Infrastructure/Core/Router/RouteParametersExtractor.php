<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

use Infrastructure\Core\Http\Request;

class RouteParametersExtractor
{
    public function extract(Request $request, Route $route): void
    {
        $routeWildCards = (new WildCardExtractor())->get($route->pattern);

        $expression = (new Expression())->build($route->pattern);
        preg_match_all($expression, $request->uri, $routeParams, PREG_SET_ORDER);

        $matchedParams = $routeParams[0];
        array_shift($matchedParams);

        $request->setAttributes(array_combine($routeWildCards, $matchedParams));
    }
}