<?php

namespace Application\Requests;

use JetBrains\PhpStorm\ArrayShape;

class Rules
{
    protected array $rules;
    protected null|string|int $id;
    protected null|string $name;
    protected null|string $status;
    protected null|string $class;
    protected null|string $password;
    protected null|string|int $idBook;
    protected null|string $nameBook;
    protected null|string $author;
    protected null|string $year;
    protected null|string $genre;
    protected null|string $ISBN;
    protected null|string $count;

    public function __construct($rules)
    {
        @$this->rules = $rules;
        //Users
        @$this->id = @$rules['id'];
        @$this->name = @$rules['name'];
        @$this->status = @$rules['status'];
        @$this->class = @$rules['class'];
        @$this->password = @$rules['password'];
        //Books
        @$this->idBook = @$rules['idBook'];
        @$this->nameBook = @$rules['nameBook'];
        @$this->author = @$rules['author'];
        @$this->year = @$rules['year'];
        @$this->genre = @$rules['genre'];
        @$this->ISBN = @$rules['ISBN'];
        @$this->count = @$rules['count'];

    }

    public function register(): array
    {
        return $this->rules;
    }

    #[ArrayShape(['name' => "array|mixed", 'class' => "array|mixed", 'password' => "array|mixed"])]
    public function login(): array
    {
        return [
            'name' => $this->name,
            'class' => $this->class,
            'password' => $this->password
        ];
    }

    #[ArrayShape(['id' => "mixed|string"])]
    public function idUser(): array
    {
        return [
            'id' => $this->id
        ];
    }

    public function storeBook(): array
    {
        return [
          'name' => $this->nameBook,
          'author' => $this->author,
          'year' => $this->year,
          'genre' => $this->genre,
          'ISBN' => $this->ISBN,
          'count' => $this->count,
        ];
    }

}