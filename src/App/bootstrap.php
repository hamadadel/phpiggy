<?php

declare(strict_types=1);

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
use App\Config\Paths;
use Dotenv\Dotenv;

use function  App\Config\{registerRoutes, registerMiddleware};

$dotenv = Dotenv::createImmutable(PATHS::ROOT)->load();

$app = new App(Paths::SOURCE.'App/container-definitions.php');

registerRoutes($app);
registerMiddleware($app);
return $app;
