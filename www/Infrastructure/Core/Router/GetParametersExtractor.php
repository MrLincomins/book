<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

use Infrastructure\Core\Http\Request;

class GetParametersExtractor
{
    public function extract(Request $request, Route $route): void
    {
        $routeWildCards = (new GetDataExtractor())->get($request->uri);
        $matchedParams = (new GetExpression())->build($request->uri);
        if(empty($matchedParams)) {
            $matchedParams = [];
        }
        if(empty($matchedParams) and !empty($routeWildCards))
        {
            $matchedParams = ['null'];
        }

        $request->setGetAttributes(array_combine($routeWildCards, $matchedParams));
    }
}