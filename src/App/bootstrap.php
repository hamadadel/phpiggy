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
use function  App\Config\registerRoutes;
$app = new App;

registerRoutes($app);

return $app;
