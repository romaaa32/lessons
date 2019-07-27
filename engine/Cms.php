<?php


namespace Engine;

/**
 * Class Cms
 * @package Engine
 */
class Cms
{
    private $di;

    /**
     * Cms constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
    }

    public function run()
    {
        $db = $this->di->get('test');
        print_r($db);
    }
}