<?php

declare(strict_types=1);


use Infrastructure\Core\Router\Route;

return [
    new Route("GET", "/knigi", "BookController@show"),
    new Route("POST", "/scan", "BookController@scan"),
    new Route("GET", "/add", "BookController@add"),
    new Route("GET", "/year", "BookController@ToYear"),
    new Route("GET", "/top100", "BookController@Top100"),
    new Route("GET", "/books/{id}", "BookController@delete"),


];
//Я что-то неправильно делаю или здесь ошибка?
//Если существует uri /books то я не могу создать /books/{id}
// Меня просто кидает на сраницу /books, когда перехожу на /books/{id}
// Подскажите пожалуйста, что нужно сделать
//Новые задания мне давать не надо, я хочу проапгрейдить эти сраницы
