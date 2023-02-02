<?php
namespace Application\Entities;
/**
 * Класс пользователей
 */
class User
{
    public int $id;
    public string $name;
    public string $status;
    public string $class;
    public string $password;

    public function __construct(int $id, string $name, string $status, string $class, string $password)
    {
        @$this->id = $id;
        @$this->name = $name;
        @$this->class = $class;
        @$this->status = $status;
        @$this->password = $password;
    }


}
