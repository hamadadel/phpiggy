<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{
    private array $globalTemplateData = [];

    public function __construct(private string $viewsPath)
    {
    }

    public function render(string $template, array $data = [])
    {
        if (!empty($data))
            extract($data);

        extract($this->globalTemplateData, EXTR_SKIP);// prevent overwritten variables

        ob_start();

        include $this->resolve($template);

        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    }

    private function resolve(string $path): string
    {
        if (strpos($path, '.') !== false) {
            $path = str_replace('.', '/', $path);
        }

        return $this->viewsPath . $path . '.php';
    }

    public function addToGlobal(string $key, mixed $value): void
    {
        $this->globalTemplateData[$key] = $value;
    }
}
