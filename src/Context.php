<?php

namespace ch4;


use ch4\response\Json;

class Context
{

    public Request $request;
    public Response $response;

    public array $context;


    public function __construct()
    {
        $this->request = new Request();
        $cookie = new Cookie($this->request);
        $this->response = new Json($cookie);
    }
}