<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;

class Validator
{
    private array $rules = [];

    public function addRule(string $alias, RuleInterface $rule)
    {
        $this->rules[$alias] = $rule;
    }

    public function validate(array $data, array $fields)
    {
        $errors = [];
        foreach ($fields as $field => $rules) {
            foreach ($rules as $rule) {
                $ruleInstance = $this->rules[$rule];
                if ($ruleInstance->validate($data, $field, []))
                    continue;
                $errors[] = $ruleInstance->getMessage($data, $field, []);
            }
        }
        var_dump($errors);
    }
}
