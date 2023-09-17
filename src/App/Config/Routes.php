<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, AuthController};

function registerRoutes(App $app): void
{
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/about', [HomeController::class, 'about']);
    $app->get('/auth/register', [AuthController::class, 'registerView']);
    $app->post('/auth/register', [AuthController::class, 'register']);
}
