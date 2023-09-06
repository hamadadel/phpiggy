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
        echo 'application is ready to run';
    }

    public function get(string $path)
    {   /** 
        * if we wish to invoke a method from an instance stored in a 
        * private property we must define another method for doing so
        */
        $this->router->add($path, 'GET');
    }
}