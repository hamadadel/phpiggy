<?php
/**
 * The Application Class Purpose is to preparing the
 * framework tools and components
 */
declare(strict_types = 1);

namespace Framework;

class App
{
    private Router $router;
    
    public function __construct()
    {
        $this->router = new Router;
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $this->router->dispatch($path, $method);
    }

    public function get(string $path, array $controller)
    {   /** 
        * if we wish to invoke a method from an instance stored in a 
        * private property we must define another method for doing so
        */
        $this->router->add($path, 'GET', $controller);
    }
}