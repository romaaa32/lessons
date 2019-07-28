<?php


namespace Engine\Core\Router;


class Router
{

    private $routes = [];
    private $host;
    private $dispatcher;


    /**
     * Router constructor.
     * @param $host URL 'http://lessons.com/...'
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     */
    public function add($key, $pattern, $controller, $method = 'GET')
    {
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method,
        ];
    }

    public function dispatch($method, $uri)
    {

    }

    public function getDispatcher()
    {
        if ($this->dispatcher == null) {

        }

        return $this->dispatcher;
    }
}