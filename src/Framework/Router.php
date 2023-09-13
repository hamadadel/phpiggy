<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];
    private array $middlewares = [];

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

            $action = fn() => $controllerInstance->$method();

            foreach ($this->middlewares as $middleware) {
                $middlewareInstance =  ($container) ? $container->resolve($middleware) : new $middleware;
                $action = fn() => $middlewareInstance->process($action);
            }
            $action();
            return;
        }
    }

    public function addMiddleware(string $middleware)
    {
        $this->middlewares[] = $middleware;
    }
}
