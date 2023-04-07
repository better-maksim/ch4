<?php

declare(strict_types=1);

namespace ch4;

class Router
{
    protected static array $routers;

    /**
     * @param HTTPMethod $method
     * @param string $uri
     * @param $func
     * @return void
     * @author 国柱<guozhu@bianfeng.com>
     */
    public static function addRouter(HTTPMethod $method, string $uri, $func): void
    {
        if (isset(self::$routers[$method->name], $uri)) {
            throw new \RuntimeException('route path already exists');
        }
        self::$routers[$method->name][$uri] = $func;
    }

    public static function hasRouter(HTTPMethod $method, string $uri): bool
    {
        if (isset(self::$routers[$method->name], $uri)) {
            return true;
        }
        return false;
    }

    public static function getHandleFunc(HTTPMethod $method, $uri): callable
    {
        return self::$routers[$method->name][$uri];
    }
}