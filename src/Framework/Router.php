<?php

declare(strict_types = 1);

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
        $path = '/'.$path.'/';
        return preg_replace('#[/]{2,}#', '/', $path);
    }

    public function dispatch(string $path, string $method)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach($this->routes as $route)
         {
            if(
            ! preg_match("#^{$route['path']}$#", $path) || 
            $route['method'] !== $method
            ) 
                continue;

            echo 'route matched';
         }
    }
}