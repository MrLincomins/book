<?php

declare(strict_types=1);

namespace Infrastructure\Core\View;

final class View
{

    private string $name;
    private array $data;

    public function __invoke(): string
    {
        $template = $_SERVER['DOCUMENT_ROOT'] ."/Application/Views/" . $this->name . ".php";

        if (!is_file($template)) {
            throw new \RuntimeException('Template not found: ' . $template);
        }

        // define a closure with a scope for the variable extraction
        $result = function($file, array $data = array()) {
            ob_start();
            extract($data, EXTR_SKIP);
            try {
                include $file;
            } catch (\Exception $e) {
                ob_end_clean();
                throw $e;
            }
            return ob_get_clean();
        };

        // call the closure
        return $result($template, $this->data);
    }

    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function withData(array $data): self
    {
        $this->data = $data;
        return $this;

    }
    
}