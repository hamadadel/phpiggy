<?php
declare(strict_types = 1);

use Framework\TemplateEngine;


return [
    TemplateEngine::class => fn () => new TemplateEngine(App\Config\Paths::VIEW)
];