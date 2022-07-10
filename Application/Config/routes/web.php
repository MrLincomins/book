<?php

declare(strict_types=1);


use Infrastructure\Core\Router\Route;

return [
    new Route("GET", "/knigi", "BookController@show"),
    new Route("GET", "/add", "BookController@add"),
    new Route("POST", "/add", "BookController@scan"),
    new Route("GET", "/year", "BookController@ToYear"),
    new Route("GET", "/top100", "BookController@Top100"),
    new Route("GET", "/books/{id}", "BookController@delete"),
    new Route("GET", "/disk_add", "CDController@add"),
    new Route("GET", "/disk", "CDController@show"),
    new Route("GET", "/register", "UserController@register"),
    new Route("GET", "/show", "UserController@show"),
    new Route("GET", "/login", "UserController@login"),
    new Route("GET", "/main", "UserController@main"),
    new Route("GET", "/logout", "UserController@logout"),
    new Route("GET", "/account", "UserController@account"),
    new Route("GET", "/booksgive", "UserController@give"),
    new Route("GET", "/booksreturn", "UserController@return"),
];
//Я что-то неправильно делаю или здесь ошибка?
//Если существует uri /books то я не могу создать /books/{id}
// Меня просто кидает на сраницу /books, когда перехожу на /books/{id}
// Подскажите пожалуйста, что нужно сделать
