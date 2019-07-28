<?php


namespace Engine;

use Engine\Helper\Common;
use Engine\Service\Router\DispatchedRoute;

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
        try {

            require_once __DIR__ . '/../cms/Route.php';
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }
}