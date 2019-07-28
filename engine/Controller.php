<?php

namespace Engine;

use Engine\DI\DI;

/**
 * Class Controller
 * @package Engine
 */
class Controller
{

    /**
     * @var DI
     */
    protected $di;

    protected $db;

    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }
}