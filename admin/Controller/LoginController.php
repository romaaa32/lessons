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

        if ($this->auth->hashUser() !== null) {
            $this->auth->authorize($this->auth->hashUser());
        }

        if ($this->auth->authorized()) {
            header('Location: /admin/', true, 301);
            exit;
        }
    }

    public function form()
    {
        $this->view->render('login');

        if ($this->auth->authorized()) {
            print_r($_COOKIE);
        }
    }

    public function authAdmin()
    {
        $params = $this->request->post;

        $query = $this->db->query('
            SELECT * 
            FROM user
            WHERE email="'.$params['email'].'"
            AND password="'.md5($params['password']).'"
            LIMIT 1
        ');

        if(!empty($query)) {
            $user = $query[0];

            if ($user['role'] == 'admin') {
                $hash = md5($user['id'].$user['email'].$user['password'].$this->auth->salt());

                $this->db->execute('
                    UPDATE user
                    SET has="'.$hash.'"
                    WHERE id='.$user['id'].'
                ');

                $this->auth->authorize($hash);

                header('Location: /admin/login', true, 301);
                exit;
            }
        }
    }
}