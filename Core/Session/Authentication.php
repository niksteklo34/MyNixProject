<?php


namespace Core\Session;

use App\Models\User;

class Authentication
{
    public User $user;
    public $id;
    public $name;
    public $surname;
    public $email;
    public $pass;

    public function __construct()
    {
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
        $resultUser = $this->user->userExist($this->email);
        $resultUser = $resultUser[0];
        $session = new Session();
        if ($resultUser->name == $this->name && $resultUser->surname == $this->surname && $resultUser->email == $this->email && $resultUser->password == $this->pass){
            $session->set('id', $resultUser->id);
            $session->set('name', $this->name);
            $session->set('surname', $this->surname);
            $session->set('email', $this->email);
            $session->set('pass', $this->pass);
            return true;
        } else {
            return false;
        }
    }

}