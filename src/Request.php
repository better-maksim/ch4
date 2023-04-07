<?php

declare(strict_types=1);

namespace ch4;

class Request
{
    public string|false $input;

    public function __construct()
    {
        $this->input = file_get_contents('php://input');
    }

    public function get(string $name)
    {
        return $_GET[$name];
    }

    public function getUri(): string
    {
        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        if (empty($uri)) {
            $uri = '/';
        }
        return $uri;
    }

    public function getMethod(): HTTPMethod
    {
        return match (ucfirst(strtolower($_SERVER['REQUEST_METHOD']))) {
            HTTPMethod::Get->name => HTTPMethod::Get,
            HTTPMethod::Post->name => HTTPMethod::Post,
            HTTPMethod::Put->name => HTTPMethod::Put,
            HTTPMethod::Head->name => HTTPMethod::Head,
        };
    }

}