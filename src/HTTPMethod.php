<?php

declare(strict_types=1);

namespace ch4;

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


    public function getMethods(): array
    {
        $methods = [];
        foreach (HTTPMethod::cases() as $method) {
            $methods[] = $method->name;
        }
        return $methods;
    }
}