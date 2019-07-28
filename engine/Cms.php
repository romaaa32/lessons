<?php


namespace Engine;

use Engine\Helper\Common;

/**
 * Class cms
 * @package Engine
 */
class Cms
{
    private $di;

    public $router;

    /**
     * cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function run()
    {
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/user/12', 'ProductController:index');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

        list($class, $action) = explode(':', $routerDispatch->getController(), 2);

        $controller = '\\Cms\\Controller\\' . $class;
        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());

    }
}