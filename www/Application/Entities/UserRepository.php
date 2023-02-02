<?php

namespace Application\Entities;

interface UserRepository
{
    public function register($name, $status, $class, $password): array;
}