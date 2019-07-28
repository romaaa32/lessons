<?php


namespace Engine\Service\Request;


use Engine\Core\Request\Request;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{

    /**
     * @var string
     */
    public $serviceName = 'request';

    /**
     * Инициализирует сервис в DI контейнер
     *
     * @return mixed
     */
    function init()
    {
        $request = new Request();

        $this->di->set($this->serviceName, $request);
    }
}