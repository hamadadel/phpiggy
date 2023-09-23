<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;

class ValidationExceptionMiddleware implements MiddlewareInterface
{

    public function process(callable $next)
    {
        try {
            $next();
        } catch (ValidationException $e) {
            $_SESSION['errors'] = $e->errors;
            // Filter old form data by removing password and confirm password values
            $_SESSION['oldFormData'] = array_diff_key($_POST, array_flip(['password', 'confirmPassword']));
            redirectTo($_SERVER['HTTP_REFERER']);
        }
    }
}
