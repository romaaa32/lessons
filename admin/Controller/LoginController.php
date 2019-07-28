<?php


namespace Admin\Controller;


use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\DI\DI;

class LoginController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * LoginController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();
    }

    public function form()
    {
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;

        print_r($params);
    }
}