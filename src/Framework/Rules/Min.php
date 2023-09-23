<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class Min implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (!$params['min'])
            throw new \InvalidArgumentException('Minimum length not specified');
        return $data[$field] >= $params['min'];
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "The {$field} must be greater than {$params['min']}";
    }
}
