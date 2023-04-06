<?php

namespace Guozhu\Ch4;

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

        $method = match (ucfirst(strtolower($_SERVER['REQUEST_METHOD']))) {
            HTTPMethod::Get->name => HTTPMethod::Get,
            HTTPMethod::Post->name => HTTPMethod::Post,
            HTTPMethod::Put->name => HTTPMethod::Put,

        };

        if ($this->router::hasRouter($method, $uri)) {

            $func = $this->router::getHandleFunc($method, $uri);
            call_user_func($func, $this->context);
        }
    }


}