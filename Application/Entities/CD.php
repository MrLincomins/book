<?php

namespace Application\Entities;

/**
 * Класс дисков.
 * Все данные о дисках из базы берем через этот класс
 */
class CD
{
    public string $name;
    public string $author;
    public int $code;
    public string $description;


    public function __construct(string $name, string $author, int $code, string $description)
    {
        $this->name = $name;
        $this->author = $author;
        $this->code = $code;
        $this->description = $description;
    }


}

