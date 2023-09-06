<?php
declare(strict_types = 1);
// realpath(__DIR__.'/../src/App');

require_once __DIR__.'/../src/App/functions.php';
$app = require_once __DIR__ . '/../src/App/bootstrap.php';

$app->run();

