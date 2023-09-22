<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorService;

class AuthController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService
    ) {
    }
    public function registerView()
    {
        echo  $this->view->render('auth.register');
    }

    public function register()
    {
      $this->validatorService->validate($_POST);
    }
}
