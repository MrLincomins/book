<?php

declare(strict_types=1);


use Infrastructure\Core\Router\Route;

return [
    // /books/12 == pregmatch(/books/[d+]./g, /books/12)

    // id = 12


    // GET myapp.com/api/v1/entity -all ;
    // GET myapp.com/api/v1/entity/id - concrete ;

    new Route("GET", "/books/{id}", "BookController@show"),
    new Route("GET", "/books", "BookController@all"),
    new Route("GET", "/books/create", "BookController@create"),
    new Route("POST", "/books", "BookController@store"),
    new Route("POST", "/books/{id}", "BookController@delete"),
    new Route("GET", "/books/year", "BookController@toYear"),
    new Route("POST", "/books/year", "BookController@tooYear"),
    //new Route("GET", "/top100", "BookController@Top100"),
    //new Route("GET", "/disk_add", "CDController@add"),
    //new Route("GET", "/disk", "CDController@show"),
    //new Route("GET", "/register", "UserController@register"),
    //new Route("GET", "/show", "UserController@show"),
    //new Route("GET", "/login", "UserController@login"),
    //new Route("GET", "/main", "UserController@main"),
    //new Route("GET", "/logout", "UserController@logout"),
    //new Route("GET", "/account", "UserController@account"),
    //new Route("GET", "/booksGive", "UserController@give"),
    //new Route("GET", "/booksReturn", "UserController@return"),
    //new Route("GET", "/allBooks", "UserController@allbooks"),
    //new Route("GET", "/searchBook", "BookController@searchbook"),
    //new Route("GET", "/tooBook", "UserController@toobook"),
    //new Route("GET", "/tooBook/{id}", "UserController@tobook"),
    //new Route("GET", "/allTooBook", "UserController@alltoobook")
    new Route("GET", "/books", "BookController@all"),
];

//"/books/{id}" == \/books\/(\d+)