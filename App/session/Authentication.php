<?php


namespace App\session;

use App\session\Session;

class Authentication
{
    public Session $session;
    public $login;
    public $pass;


    public function __construct()
    {
        $this->session = new Session();
    }

    public function auth(string $login, string $pass): bool
    {
        $this->login = $login;
        $this->pass = $pass;
        return true;
    }

    public function isAuth()
    {
        return $this->session->sessionExists();
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function logOut(): void
    {
        session_abort();

        session_start();
        session_abort();
    }
}