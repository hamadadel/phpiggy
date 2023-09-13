<?php
declare(strict_types = 1);

namespace Framework\Contracts;

interface MiddlewareInterface
{
    /**
     * @return mixed
     * Process the request, get called before the controller handle the request
     */
    public function process(callable $next);
}