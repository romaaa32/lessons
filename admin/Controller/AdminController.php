<?php
namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
use Engine\DI\DI;

class AdminController extends Controller
{
    /**
     * @var Auth
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

        if (isset($this->request->get['logout'])) {
            $this->auth->unAuthorize();
        }

        $this->chekAutorization();
    }

    public function chekAutorization()
    {
        if ($this->auth->hashUser() !== null) {
            $this->auth->authorize($this->auth->hashUser());
        }

        if (!$this->auth->authorized()) {
            header('Location: /admin/login', true, 301);
            exit;
        }
    }

}