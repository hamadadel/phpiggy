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
}