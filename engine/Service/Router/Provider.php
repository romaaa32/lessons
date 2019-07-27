<?php


namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{

    /**
     * @var string
     */
    public $serviceName = 'router';

    /**
     * Инициализирует сервис в DI контейнер
     *
     * @return mixed
     */
    function init()
    {
        $router = new Router('http://lessons.com/');

        $this->di->set($this->serviceName, $router);
    }
}