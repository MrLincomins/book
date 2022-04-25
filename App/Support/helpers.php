<?php

/**
 * Функция помогает посмотреть данные в любой переменной.
 * @param $variable
 *
 */
function dd($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    die;
}