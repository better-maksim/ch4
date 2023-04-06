<?php

namespace Guozhu\Ch4;

enum HTTPMethod
{
    case Get;
    case Post;
    case Head;
    case Put;
    case Options;
    case Delete;
    case Connect;
    case Trace;

    public function toHTTPMethod(string $method): HTTPMethod
    {

    }
}