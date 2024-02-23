<?php

declare(strict_types=1);

namespace App\Config;

class Paths
{
    public const DS = DIRECTORY_SEPARATOR;
    public const VIEW =  __DIR__ . self::DS.'..'.self::DS.'views'.self::DS;
    public const SOURCE = __DIR__ .'/../../';
    public const ROOT =__DIR__.'..'.self::DS.'..'.self::DS.'..'.self::DS.'..'.self::DS;
}
