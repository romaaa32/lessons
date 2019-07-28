<?php
namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\DI\DI;

class AdminController extends Controller
{
    /**
     * @var
     */
    protected $auth;
    /**
     * AdminController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if (!$this->auth->authorized and $this->request->server['REQUEST_URI'] !== '/admin/login') {
            header('Location: /admin/login', true, 301);
            exit;
        }
    }
}