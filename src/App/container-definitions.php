<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\Services\Validator;


return [
    TemplateEngine::class => fn () => new TemplateEngine(App\Config\Paths::VIEW),
    Validator::class => fn () => new Validator,
];
