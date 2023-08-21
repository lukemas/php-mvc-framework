<?php

/**
 * Class Router
 * 
 * @author Lukasz Maslowski
 * @package app\core
 */

namespace app\core;

class Router 
{
    protected \app\core\Request $request;
    public Router $router;
    protected array $routes = [];
/**
 * 
 * @param \app\core\Request $request
 */
    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback) 
    {
        $this->routes['get'][$path] = $callback;
    }
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "Not found";
            exit;
        }
        echo call_user_func($callback);
    }
} 