<?php


namespace Engine\Service\Load;


use Engine\Load;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{

    /**
     * @var string
     */
    public $serviceName = 'load';

    /**
     * Инициализирует сервис в DI контейнер
     *
     * @return mixed
     */
    function init()
    {
        $load = new Load();

        $this->di->set($this->serviceName, $load);
    }
}