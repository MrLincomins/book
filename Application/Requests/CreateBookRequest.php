<?php

declare(strict_types=1);

namespace Application\Requests;



use Infrastructure\Core\Http\Request;

class CreateBookRequest extends Request
{
    public function rules()
    {
        //1. Создадим класс Rule в который передаем правила
        //2. Создадим валидаторы: string, integer, required, min
        //3. Создать интерфейс Validator и метод validate
        return new Rule([
            'name' => 'string|required|min:5',
            'author' => 'string|required|min:5',
            'year' => 'integer|required',
            'ISBN' => 'integer|required',
            'count' => 'integer|required',
            'genre' => 'string|required',
        ]);
    }


}