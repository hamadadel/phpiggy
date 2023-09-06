<?php
declare(strict_types = 1);

/**
 * the purpose of this file is to load and configure 
 * the files necessary  for our application
 */
ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);


require_once __DIR__ . '/../../vendor/autoload.php';

use Framework\App;

$app = new App;

$app->get('/');
$app->get('about/team');
$app->get('/about/team');
$app->get('/about/team/');


dd($app);

return $app;
