<?php

declare(strict_types=1);


namespace Infrastructure\Core\Attribute;

abstract class AttributeReader implements ReaderInterface
{

    public function getClassMetadata(\ReflectionClass $class, string $name = null): iterable
    {
       return $this->getClassAttributes($class, $name);
    }

    public function getFunctionMetadata(\ReflectionFunctionAbstract $function, string $name = null): iterable
    {
        return $this->getFunctionAttributes($function, $name);
    }


    public function getPropertyMetadata(\ReflectionProperty $property, string $name = null): iterable
    {
        return $this->getPropertyAttributes($property, $name);
    }


    public function getConstantMetadata(\ReflectionClassConstant $constant, string $name = null): iterable
    {
        return $this->getConstantAttributes($constant, $name);
    }


    public function getParameterMetadata(\ReflectionParameter $parameter, string $name = null): iterable
    {
        return $this->getParameterAttributes($parameter, $name);
    }

    /**
     * @return iterable<\ReflectionClass, array>
     */
    abstract protected function getClassAttributes(\ReflectionClass $class, ?string $name): iterable;

    /**
     * @return iterable<\ReflectionClass, array>
     */
    abstract protected function getFunctionAttributes(\ReflectionFunctionAbstract $function, ?string $name): iterable;

    /**
     * @return iterable<\ReflectionClass, array>
     */
    abstract protected function getPropertyAttributes(\ReflectionProperty $property, ?string $name): iterable;

    /**
     * @return iterable<\ReflectionClass, array>
     */
    abstract protected function getConstantAttributes(\ReflectionClassConstant $const, ?string $name): iterable;

    /**
     * @return iterable<\ReflectionClass, array>
     */
    abstract protected function getParameterAttributes(\ReflectionParameter $param, ?string $name): iterable;
}