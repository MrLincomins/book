<?php

namespace App\Controllers;


use App\Core\View\View;

abstract class BaseController
{
    public function render(string $template, array $data)
    {

        $templateFile = $_SERVER['DOCUMENT_ROOT'] ."/App/Views/" . $template;

        return (new View())->render($templateFile, $data);
    }
}