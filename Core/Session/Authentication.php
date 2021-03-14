<?php


namespace Core\Session;

use App\Models\User;

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
        $this->user = new User();
        $this->session = Session::getInstance();
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
        $resultUser = $this->user->checkUserExist($this->email);
        if ($resultUser->name == $this->name &&
            $resultUser->surname == $this->surname &&
            $resultUser->email == $this->email &&
            password_verify($this->pass, $resultUser->password)
        ){
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

}