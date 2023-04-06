<?php

namespace Guozhu\Ch4;
class Context
{

    public $request;

    public $config;

    public $response;


    public function __construct()
    {
        $this->request = new Request();
    }
}