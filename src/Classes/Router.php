<?php

namespace App\Classes;

use App\Controllers\BalanceListController;
use App\Controllers\CustomerListController;
use App\Controllers\MainPageController;
use Exception;

class Router
{
    protected static $routes = [
        'home' => MainPageController::class,
        'balance' => BalanceListController::class,
    ];

    /**
     * @throws Exception
     */
    public static function __callStatic(string $name, array $arguments)
    {
        if (!isset(static::$routes[$name])) {
            throw new Exception('Path does not exist');
        }
        (new static::$routes[$name])->handle();
    }

    /**
     * @throws Exception
     */
    public static function route(): void
    {
        $route = $_GET['page'] ?? 'home'; // Home is default route
        if (!isset(static::$routes[$route])) {
            throw new Exception('Path does not exist');
        }
        static::$route();
    }
}