<?php
declare(strict_types = 1);

/**
 * the purpose of this file is to load and configure 
 * the files necessary  for our application
 */

ini_set('display_errors', 1);
ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);


require_once __DIR__ . '/../../vendor/autoload.php';

use Framework\App;
use App\Controllers\HomeController;

$app = new App;

$app->get('/', [HomeController::class, 'index']);

$app->get('/auth/register', ['App\Controllers\Auth', 'register']);
return $app;
