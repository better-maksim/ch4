<?php

namespace guozhu\ch4;

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

}