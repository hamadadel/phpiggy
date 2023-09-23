<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;

use Framework\Rules\{Required, Email, Min, Max, URL};


class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator;
        $this->validator->addRule('required', new Required);
        $this->validator->addRule('email', new Email);
        $this->validator->addRule('min', new Min);
        $this->validator->addRule('max', new Max);
        $this->validator->addRule('url', new URL);
    }

    public function validate(array $data)
    {
        $this->validator->validate($data, [
            'email' => ['required', 'email'],
            'age' => ['required', 'min:18', 'max:60'],
            'country' => ['required'],
            'socialMediaURL' => ['required', 'url'],
            'password' => ['required', 'confirm'],
            'confirmPassword' => ['required'],
            'termsOfService' => ['required']
        ]);
    }
}
