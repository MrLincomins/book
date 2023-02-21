<?php

declare(strict_types=1);


use Infrastructure\Core\Router\Route;

return [
    // /books/12 == pregmatch(/books/[d+]./g, /books/12)

    // id = 12


    // GET myapp.com/api/v1/entity -all ;
    // GET myapp.com/api/v1/entity/id - concrete ;
    new Route("GET", "/", "UserController@main"),
    new Route("GET", "/books", "BookController@all"),
    new Route("GET", "/books/{id}", "BookController@show"),
    new Route("GET", "/books/create", "BookController@create"),
    new Route("POST", "/books/create", "BookController@store"),
    new Route("POST", "/books/{id}", "BookController@delete"),
    new Route("GET", "/books/year", "BookController@toYear"),
    new Route("POST", "/books/year", "BookController@tooYear"),
    new Route("GET", "/books/top", "BookController@top100"),
    new Route("GET", "/books/edit/{id}", "BookController@editForm"),
    new Route("POST", "/books/edit/{id}", "BookController@edit"),
    new Route("GET", "/books/genre", "BookController@allGenres"),
    new Route("POST", "/books/genre", "BookController@addGenre"),
    new Route("POST", "/books/genre/{id}", "BookController@deleteGenre"),
    new Route("GET", "/books/genre/edit/{id}", "BookController@formEditGenre"),
    new Route("POST", "/books/genre/edit/{id}", "BookController@editGenre"),
    new Route("GET", "/books/search?", "BookController@search"),
    new Route("GET", "/register", "UserController@preRegister"),
    new Route("POST", "/register", "UserController@register"),
    new Route("GET", "/login", "UserController@preLogin"),
    new Route("POST", "/login", "UserController@login"),
    new Route("GET", "/logout", "UserController@logout"),
    new Route("GET", "/books/reserve/{id}", "BookController@preReserveTheBook"),
    new Route("POST", "/books/reserve/{id}", "BookController@reserveTheBook"),
    new Route("GET", "/books/reserve/show", "BookController@showReserve"),
    new Route("GET", "/books/borrow/{id}", "BookController@preBorrowBook"),
    new Route("POST", "/books/borrow/{id}", "BookController@borrowBook"),
    new Route("GET", "/books/borrow/show", "BookController@showBorrowBook"),
    new Route("GET", "/books/borrow/return", "BookController@checkUserBorrow"),
    new Route("GET", "/books/borrow/return/{id}", "BookController@preReturnBorrow"),
    new Route("POST", "/books/borrow/return/{id}", "BookController@returnBook"),
    new Route("POST", "/books/reserve/show/{id}", "BookController@deleteReserve"),
    new Route("GET", "/user", "UserController@profile"),
    //new Route("GET", "/books/borrow/return/{id}", "BookController@showBorrowBook"),

    //new Route("GET", "/show", "UserController@show"),
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
];

//"/books/{id}" == \/books\/(\d+)