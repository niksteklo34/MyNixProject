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
        $this->login = 'Nikita';
        $this->pass = 'Niksteklo34';
    }

    public function auth(string $login, string $surname, string $email, string $pass) : bool
    {
        if ($this->login == $login && $this->pass == $pass) {
            $this->session->set('name', $login);
            $this->session->set('surname', $surname);
            $this->session->set('email', $email);
            $this->session->set('pass', $pass);
            return true;
        } else {
            return false;
        }
    }

    public function isAuth()
    {
        return $this->session->sessionExists();
    }

    public function getLogin()
    {
        return $this->session->get('name');
    }

    public function logOut(): void
    {
        $this->session->destroy();
    }
}