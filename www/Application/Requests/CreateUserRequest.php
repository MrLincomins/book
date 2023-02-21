<?php

namespace Application\Requests;

use Infrastructure\Core\Http\Request;
use Application\Requests\Validator;
use JetBrains\PhpStorm\ArrayShape;
use Application\Requests\Rules;

class CreateUserRequest extends Request
{
    #[ArrayShape(['name' => "string", 'status' => "string", 'class' => "string", 'password' => "string"])]
    public function rules(): \Application\Requests\Rules
    {
        //1. Создадим класс Rule в который передаем правила
        //2. Создадим валидаторы: string, integer, required, min
        //3. Создать интерфейс Validator и метод validate
        return new Rules([
            'id' => 'required',
            'name' => 'required|string|max:50',
            'status' => 'required|string|max:12',
            'class' => 'required|string|max:3',
            'password' => 'required|string|min:5|max:35',
        ]);
    }
// $name, $status, $class, $password

    public function validation($item, $methodName): ?array
    {
        $rules = $this->rules()->$methodName();
        $validator = new Validator($item);
        return $validator->validate($rules);
    }

}