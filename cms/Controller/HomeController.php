<?php


namespace Cms\Controller;


use Engine\Controller;
use Engine\DI\DI;

class HomeController extends Controller
{

    /**
     * HomeController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);
    }

    public function index()
    {
        echo 'Index Page';
    }
}