<?php
declare(strict_types = 1);

namespace App\Config;

use Framework\App;
use App\Controllers\HomeController;

function registerRoutes(App $app): void
{
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/about', [HomeController::class, 'about']);
    $app->get('/auth/register', ['App\Controllers\Auth', 'register']);
}