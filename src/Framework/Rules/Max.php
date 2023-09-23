<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class Max implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {

        if (!$params['max'])
            throw new \InvalidArgumentException('Maximum length not specified');
        return $data[$field] <= $params['max'];
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "The {$field} must be less than {$params['max']}";
    }
}
