<?php

declare(strict_types=1);

namespace ch4;

class Engine
{
    const version = '0.0.1';
    protected Context $context;
    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
        $this->context = new Context();
    }

    public function run(): void
    {
        $uri = $this->context->request->getUri();
        $method = $this->context->request->getMethod();

        if ($this->router::hasRouter($method, $uri)) {
            $func = $this->router::getHandleFunc($method, $uri);
            call_user_func($func, $this->context);
        }
    }
}