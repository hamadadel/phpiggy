<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database};
use App\Services\ValidatorService;


return [
    TemplateEngine::class => fn () => new TemplateEngine(App\Config\Paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService,
    Database::class => fn() => new Database('mysql', [
        'host'=>'127.0.0.1',
        'port'=>3306,
        'dbname'=>'workopia'
    ], 'workopia', 'Workopia@2024'),
];
