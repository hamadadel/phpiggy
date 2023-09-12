<?php

/**
 * The job of the container
 * Is to store a list of instructions for creating instances "definitions"
 */
declare(strict_types = 1);

namespace Framework;

use Framework\Exceptions\ContainerException;
use ReflectionClass;

class Container
{
    private array $definitions = [];

    public function addDefinitions(array $definition): void
    {
        $this->definitions = [...$this->definitions, ... $definition];
    }

    public function resolve( string $controller)
    {
        $reflectionClass = new ReflectionClass($controller);
        if (! $reflectionClass->isInstantiable())
            throw new ContainerException("class {$controller} is not Instantiable");

        $constructor = $reflectionClass->getConstructor();
        if (! $constructor)
            return new $controller;

        $parameters = $constructor->getParameters();
        if (!$parameters)
            return new $controller;

        $dependencies = $this->extractDependencies($parameters, $controller);

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    private function extractDependencies(array $parameters, string $controller): array
    {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            $name = $parameter->getName();
            $type = $parameter->getType();
            if (! $type)
                throw new ContainerException("Failed to resolve class {$controller}, parameter {$name} is missing a type hint");

            if (! $type instanceof \ReflectionNamedType || $type->isBuiltin())
                throw new ContainerException("Failed to resolve class {$controller}, invalid parameter name.");

            if (!array_key_exists($type->getName(), $this->definitions))
                throw new ContainerException("Class ${$controller} does not exist in the Container.");

            $dependencies[]= $this->definitions[$type->getName()]();
        }
        return $dependencies;
    }
}