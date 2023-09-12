<?php

/**
 * The job of the container
 * Is to store a list of instructions for creating instances "definitions"
 */
declare(strict_types = 1);

namespace Framework;

class Container
{
    private array $definitions = [];

    public function addDefinitions(array $definition): void
    {
        $this->definitions = [...$this->definitions, ... $definition];
    }
}