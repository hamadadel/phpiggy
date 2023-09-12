<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{

    public function __construct(private string $viewsPath)
    {
    }

    public function render(string $template, array $data = [])
    {
        if (!empty($data))
            extract($data);

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
}
