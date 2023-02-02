<?php

declare(strict_types=1);

namespace Application\Requests;


use Infrastructure\Core\Http\Request;
use Application\Requests\Validator;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;

class CreateBookRequest extends Request
{


    #[ArrayShape(['name' => "string", 'author' => "string", 'year' => "string", 'genre' => "string", 'ISBN' => "string", 'count' => "string"])]
    public function rules(): array
    {
        //1. Создадим класс Rule в который передаем правила
        //2. Создадим валидаторы: string, integer, required, min
        //3. Создать интерфейс Validator и метод validate
        return [
            'name' => 'required|string',
            'author' => 'required|string',
            'year' => 'required|integer|max:4',
            'genre' => 'required|string',
            'ISBN' => 'required|integer|min:9',
            'count' => 'required|integer'
        ];
    }

    public function validation($item): ?array
    {
        $rules = $this->rules();
        $validator = new Validator($item);
        return $validator->validate($rules);
    }

}