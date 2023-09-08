<?php
declare(strict_types = 1);

function dd(mixed $value)
{
    var_dump($value);
    exit();
}

function e(mixed $value): string
{
    return htmlspecialchars((string)$value);
}