<?php

declare(strict_types=1);

namespace App\Controllers;

use  Framework\TemplateEngine;
use App\Config\Paths;

class HomeController
{
    private TemplateEngine $view;

    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }
    public function index()
    {

        echo  $this->view->render('index', ['title' => 'Home']);
    }

    public function about()
    {
        echo $this->view->render('about', ['title' => 'About']);
    }
}
