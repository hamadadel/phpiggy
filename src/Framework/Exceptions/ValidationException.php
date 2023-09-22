<?php
declare(strict_types = 1);
namespace Framework\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class ValidationException extends \RuntimeException
{
    public function __construct(int $code = 422)
    {
        parent::__construct(code: $code);
    }
}