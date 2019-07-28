<?php


namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

class Auth implements AuthInterface
{
    /**
     * @var bool
     */
    protected $authorized = false;
    protected $hash_user;

    /**
     * @return bool
     */
    public function authorized()
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function hashUser()
    {
        return Cookie::get('auth_user');
    }

    /**
     * @param $user
     */
    public function authorize($user)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);

        $this->authorized = true;
        $this->hash_user = $user;
    }

    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');

        $this->authorized = false;
        $this->user = null;
    }

    /**
     * @return string
     */
    public static function salt()
    {
        return (string) rand(10000000, 99999999);
    }

    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password.$salt);
    }

}