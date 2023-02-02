<?php
namespace Application\Requests;



class Validator {
    protected array $errors;
    protected array $data;

    public function __construct($data) {
        $this->data = $data;
        $this->errors = [];
    }

    public function validate($rules): array
    {
        foreach ($rules as $field => $field_rules) {
            $field_rules = explode('|', $field_rules);
            foreach ($field_rules as $rule) {
                if (strpos($rule, ':')) {
                    list($rule, $param) = explode(':', $rule);
                }
                if (!$this->$rule($field, $param ?? null)) {
                    if (!empty($param)) {
                        $this->errors[$field][$rule] = $this->getErrorMessage($rule, $field, $param);
                    }
                }
            }
        }
        return $this->errors;
    }

    protected function required($field): bool
    {
        return !empty($this->data[$field]);
    }

    protected function min($field, $param): bool
    {
        return mb_strlen($this->data[$field]) >= $param;
    }

    protected function max($field, $param): bool
    {
        return mb_strlen($this->data[$field]) <= $param;
    }

    protected function integer($field) {
        return filter_var($this->data[$field], FILTER_VALIDATE_INT);
    }

    protected function string($field): bool
    {
        return is_string($this->data[$field]);
    }


    protected function getErrorMessage($rule, $field, $param = null): array|string
    {
        $messages = [
            'required' => 'Поле :field обязательно',
            'min' => ':field должен содержать как минимум :param символов',
            'max' => ':field не должен содержать более :param символов',
            'integer' => ':field должно быть числом',
            'string' => ':field строкой',
        ];

        $message = $messages[$rule];
        return str_replace([':field', ':param'], [$field, $param], $message);
    }
}