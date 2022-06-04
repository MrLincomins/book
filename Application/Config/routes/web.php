<?php

declare(strict_types=1);


use Infrastructure\Core\Router\Route;

return [
    new Route("GET", "/knigi", "BookController@show"),
    new Route("GET", "/add", "BookController@add"),
    new Route("GET", "/year", "BookController@ToYear"),
    new Route("GET", "/top100", "BookController@Top100"),
    new Route("GET", "/books/{id}", "BookController@delete"),
    new Route("POST", "/add", "BookController@scan"),
    new Route("GET", "/disk_add", "CDController@add"),
    new Route("GET", "/disk", "CDController@show")



];
//Я что-то неправильно делаю или здесь ошибка?
//Если существует uri /books то я не могу создать /books/{id}
// Меня просто кидает на сраницу /books, когда перехожу на /books/{id}
// Подскажите пожалуйста, что нужно сделать
