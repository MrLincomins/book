<?php

namespace Infrastructure\Core\Http;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class RequestFactory implements RequestFactoryInterface
{

    public function createRequest(string $method, $uri): RequestInterface
    {

        return new Request(
            $method,
            $uri,
            $_SERVER["QUERY_STRING"],
        );
    }


    // BookController@store

    /**
     * @throws \ReflectionException
     */
    public function createSubRequest(string $fullAction, string $method, $uri): RequestInterface
    {
            $controllersPath  = "\\Application\\Controllers\\";
            [$controller, $action] = explode( "@", $fullAction);

            $actionParameters = (new \ReflectionMethod($controllersPath . $controller, $action))->getParameters();
            $subRequestName = $actionParameters[0]->getType()->getName();
            if($subRequestName === 'Psr\Http\Message\ServerRequestInterface')
            {
                $subRequestName = 'Infrastructure\Core\Http\Request';
            }

            return new $subRequestName(
                $method,
                $uri,
                $_SERVER["QUERY_STRING"],
            );
    }
}