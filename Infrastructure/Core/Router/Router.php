<?php

declare(strict_types=1);

namespace Infrastructure\Core\Router;

use Application\Controllers\BookController;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Infrastructure\Core\Http\{Request, RequestFactory};

final class Router
{


    /** @var Route[] */
    private array $routes = [];
    public function withRoutes(array $routes): self

    {

        $this->routes = $routes;

        return $this;
    }


    public function get()
    {

    }

    public function post()
    {

    }

    public function put()
    {

    }

    public function delete()
    {

    }

    public function route(ContainerInterface $container): ResponseInterface
    {

        $requestFactory = new RequestFactory();

        $request = $requestFactory->createRequest(
            $_SERVER["REQUEST_METHOD"],
            $_SERVER["REQUEST_URI"],

        );


        // ищем по регуляке нужный роут из списка
        // /authors/{id} = /authors/12
        $route = $this->getRoute($request);
        if (is_null($route)) {
            $this->abort(404);
        }

        // /books/{id} = /books/12
        // извлекаем динамические параметры роута {id} - 12
        // и добавляем уже к существующему Request
        $this->appendRouteParametersToRequest($request, $route);
        $this->httpGetParameters($request, $route);
        // Запускаем из найденного нами роута его контроллер и action, передавая туда наш Request
        return $this->runAction($request, $route, $container);
    }

    private function getRoute(Request $request)
    {

/*        $routeWithOutExpression = current(array_filter($this->routes, function (Route $route) use ($request) {
            return $request->method === $route->method && $request->uri == $route->pattern;
        }));

        if ($routeWithOutExpression) {
            return $routeWithOutExpression;
        }*/


        $route = current(array_filter($this->routes, function (Route $route) use ($request) {
            $expression = (new Expression())->build($route->pattern);
            return $request->method === $route->method && preg_match($expression, $request->uri);
        }));

        return is_object($route)
            ? $route
            : null;
    }



    private function appendRouteParametersToRequest(Request $request, Route $route): void
    {

        (new RouteParametersExtractor())->extract($request, $route);
    }

    private function httpGetParameters(Request $request, Route $route): void
    {
        (new GetParametersExtractor())->extract($request, $route);
    }


    private function runAction(Request $request, Route $route, $container): ResponseInterface
    {
        [$controller, $action] = ControllerFactory::build($route, $container);

        if (!method_exists($controller, $action)) {
            $this->abort(404);
        }

        return $controller->$action($request);
    }

    private function abort(int $code): void
    {
        http_response_code($code);
        die;
    }
}
