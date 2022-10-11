<?php

namespace Application\Entities;

/**
 * Класс книги.
 * Все данные о книгах из базы берем через этот класс
 */
class Book
{

    public int $id;
    public string $name;
    public string $author;
    public string $ISBN;
    public int $year;
    public int $count;

    public function __construct(int $newid, string $Name, string $Author, string $ISBN, int $Year, int $count)
    {
        @$this->id = $newid;
        @$this->name = $Name;
        @$this->author = $Author;
        @$this->ISBN = $ISBN;
        @$this->year = $Year;
        @$this->count = $count;
    }

}