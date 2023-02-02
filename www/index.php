<?php

declare(strict_types=1);

use Infrastructure\Core\Container\Container;
use Infrastructure\Core\Http\HtmlResponseFactory;
use Infrastructure\Core\Router\Router;
use Infrastructure\Core\View\View;

// включаем автозагрузку классов. Нам не нужно указывать require в классах
require_once './vendor/autoload.php';


try {




    $container = new Container();
    $container->register(Router::class);
    $container->register(View::class);
    $container->register(HtmlResponseFactory::class);

// Step 0:  Создаем роутер
    $response = $container->get(Router::class)
        ->withRoutes(include 'Application/Config/routes/web.php')
        ->route($container);


// Step 1: Генерируем строку статуса.
    $statusLine = sprintf('HTTP/%s %s %s',
        $response->getProtocolVersion(),
        $response->getStatusCode(),
        $response->getReasonPhrase(),
    );
// Step 2: переопределяем хеадер, даже если он был.
    header($statusLine, TRUE);


// Step 3: Устанавливаем кастомные хедеры
    if ($response->getHeaders()) {
        foreach ($response->getHeaders() as $name => $values) {header(
                sprintf('%s: %s',
                    $name,
                    $response->getHeaderLine($name)
                ),
                FALSE
            );
        }
    }
// Step 4: Возвращаем ответ
    echo $response->getBody();
} catch (Exception) {}
exit();