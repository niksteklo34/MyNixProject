<?php


namespace App\Session;

use App\Session\Session;
use App\models\User;

class Authentication
{
    public Session $session;
    public User $user;
    public $id;
    public $name;
    public $surname;
    public $email;
    public $pass;

    public function __construct()
    {
        $this->session = new Session();
        $this->user = new User();
    }

    public function setDataForReg($name, $surname, $email, $pass)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function auth()
    {
        $resultUser = $this->user->checkUser($this->email);
        $resultUser = $resultUser[0];
        var_dump($resultUser);
        if ($resultUser->name == $this->name && $resultUser->surname == $this->surname && $resultUser->email == $this->email && $resultUser->password == $this->pass){
            $this->session->set('id', $resultUser->id);
            $this->session->set('name', $this->name);
            $this->session->set('surname', $this->surname);
            $this->session->set('email', $this->email);
            $this->session->set('pass', $this->pass);
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