<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;

use Framework\Rules\{Required};


class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator;
        $this->validator->addRule('required', new Required());
    }

    public function validate(array $data)
    {
        $this->validator->validate($data, [
            'email' => ['required'],
            'age' => ['required'],
            'country' => ['required'],
            'socialMediaURL' => ['required'],
            'password' => ['required'],
            'confirmPassword' => ['required'],
            'termsOfService' => ['required']
        ]);
    }
}
