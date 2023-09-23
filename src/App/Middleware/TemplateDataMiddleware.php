<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;

class TemplateDataMiddleware implements MiddlewareInterface
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function process(callable $next)
    {
        $this->view->addToGlobal('title', 'Expenses Tracking');
        $this->view->addToGlobal('errors', $_SESSION['errors'] ?? []);
        $this->view->addToGlobal('old', $_SESSION['oldFormData'] ?? []);

        unset($_SESSION['errors']);
        unset($_SESSION['oldFormData']);
        $next();
    }
}
