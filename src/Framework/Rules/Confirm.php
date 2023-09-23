<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class Confirm implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (!$params['confirm'])
            throw new \InvalidArgumentException('missing filed to confirm against');
        return $data[$field] === $data[$params['confirm']];
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "The {$field} and {$params['confirm']} does not match";
    }
}
