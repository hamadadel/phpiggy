<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $path, string $method, array $controller)
    {
        $this->routes[] = [
            'path' => $this->normalizePath($path),
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = '/' . $path . '/';
        return preg_replace('#[/]{2,}#', '/', $path);
    }

    public function dispatch(string $path, string $method, Container $container = null)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] !== $method
            )
                continue;

            [$controller, $method] = $route['controller'];
            $controllerInstance = ($container) ? $container->resolve($controller) : new $controller;
            if (class_exists($controller) && is_callable($controllerInstance->$method())) {
                $controllerInstance->$method();
            }
        }
    }
}
