<?php

namespace CobaMVC\App;

use CobaMVC\App\View;

require_once __DIR__ . "/View.php";
class Router
{
    private static $routes=[];
    public static function add(string $method, string $path, string $controller, string $function, array $middleware=[]): void
    {
        //[] adalah operator untuk push array
        self::$routes[]=[
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middleware
        ];
    }

    public static function run(): void
    {
        $path = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        foreach (self::$routes as $route){
            if($path == $route['path'] && $method == $route['method']){
                foreach ($route['middleware'] as $middleware){
                    $middlewareInstance = new $middleware;
                    $middlewareInstance->before();
                }
                $function = $route['function'];
                $controller = new $route['controller'];

                $controller->$function();
                return;
            }
        }
        http_response_code(404);
        View::render('notfound');
    }
}