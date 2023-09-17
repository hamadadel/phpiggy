<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\Validator;

class AuthController
{
    public function __construct(private TemplateEngine $view, private Validator $validator)
    {
        dd($this);
    }
    public function registerView()
    {
        echo  $this->view->render('auth.register');
    }

    public function register()
    {
        dd($_POST);
    }
}
