<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\Services\ValidatorService;


return [
    TemplateEngine::class => fn () => new TemplateEngine(App\Config\Paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService,
];
