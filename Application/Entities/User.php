<?php
namespace Application\Entities;
use Application\Entities\UserMapper;
/**
 * Класс автора.
 * Все данные об авторах из базы берем через этот класс
 */
class User
{
    public int $id;
    public string $name;
    public string $surname;
    public string $patronymic;
    public string $status;
    public string $class;
    public string $password;

    public function __construct(int $id, string $name, string $surname, string $patronymic, string $status, string $class, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
        $this->status = $status;
        $this->class = $class;
        $this->password = $password;
    }


}
