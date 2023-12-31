<?php

/**
 * The Application Class Purpose is to preparing the
 * framework tools and components
 */

declare(strict_types=1);

namespace Framework;

class App
{
    private Router $router;
    private Container $container;

    public function __construct(string $definitionsPath = null)
    {
        $this->router = new Router;
        $this->container =  new Container();
        if ($definitionsPath) {
            $this->container->addDefinitions(include $definitionsPath);
        }
    }

    public function run()
    {
        /**
         * we typed casting tto string because if parse_url() returned boolean value 
         * this will result in fatal error 
         */
        $path = (string) parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method, $this->container);
    }

    public function get(string $path, array $controller)
    {
        /** 
         * if we wish to invoke a method from an instance stored in a 
         * private property we must define another method for doing so
         */
        $this->router->add($path, 'GET', $controller);
    }

    public function post(string $path, array $controller)
    {
        $this->router->add($path, 'POST', $controller);
    }

    public function addMiddleware(string $middleware)
    {
        $this->router->addMiddleware($middleware);
    }
}
