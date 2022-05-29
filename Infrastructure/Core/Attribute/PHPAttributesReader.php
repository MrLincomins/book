<?php

declare(strict_types=1);


namespace Infrastructure\Core\Attribute;

/**
 * @description Класс для работы с нативными аттрибутами PHP
 */
final class PHPAttributesReader extends AttributeReader
{
    protected function getClassAttributes(\ReflectionClass $class, ?string $name): iterable
    {
        // TODO: Implement getClassAttributes() method.
    }

    protected function getFunctionAttributes(\ReflectionFunctionAbstract $function, ?string $name): iterable
    {
        // TODO: Implement getFunctionAttributes() method.
    }

    protected function getPropertyAttributes(\ReflectionProperty $property, ?string $name): iterable
    {
        // TODO: Implement getPropertyAttributes() method.
    }

    protected function getConstantAttributes(\ReflectionClassConstant $const, ?string $name): iterable
    {
        // TODO: Implement getConstantAttributes() method.
    }

    protected function getParameterAttributes(\ReflectionParameter $param, ?string $name): iterable
    {
        // TODO: Implement getParameterAttributes() method.
    }
}