<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{

    public function __construct(private string $basePath)
    {
    }

    public function render(string $template, array $data = [])
    {
        if (!empty($data))
            extract($data);

        if (strpos($template, '.') !== false) {
            $template = str_replace('.', '/', $template);
        }
        ob_start();

        include $this->basePath . $template . '.php';

        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    }
}
