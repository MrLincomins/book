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
        $matchedParams = array_diff($matchedParams, array(''));

        $request->setAttributes(array_combine($routeWildCards, $matchedParams));
    }
}

//class RouteParametersExtractor
//{
//    public function extract(Request $request, Route $route): void
//    {
//        $routeWildCards = (new WildCardExtractor())->get($route->pattern);
//        if(empty($routeWildCards))
//        {
//            $routeWildCards = (new GetDataExtractor())->get($request->uri);
//        }
//
//
//        $expression = (new Expression())->build($route->pattern);
//        preg_match_all($expression, $request->uri, $routeParams, PREG_SET_ORDER);
//
//
//        if(count($routeParams) === 2)
//        {
//            $matchedParams = $routeParams[1];
//        }
//        else
//        {
//            $matchedParams = $routeParams[0];
//        }
//
//        array_shift($matchedParams);
//        if (count($matchedParams) === 2)
//        {
//            array_shift($matchedParams);
//        }
//        //Задача на завтра: доделать $routeWildCards через GetDataExtractor и бахнуть get->attributes
//        $request->setAttributes(array_combine($routeWildCards, $matchedParams));
//
//    }
//}


//        $matchedParams = array_values(array_diff($matchedParams, array('', NULL, false)));
//        if (!empty($matchedParams)){
//            $matchedParams = array($matchedParams[1]);
//        }