<?php

namespace Application\Requests;

use JetBrains\PhpStorm\ArrayShape;

class Rules
{
    protected array $rules;
    protected string $name;
    protected string $status;
    protected string $class;
    protected string $password;

    public function __construct($rules)
    {
        @$this->rules = $rules;
        @$this->name = $rules['name'];
        @$this->status = $rules['status'];
        @$this->class = $rules['class'];
        @$this->password = $rules['password'];
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

}