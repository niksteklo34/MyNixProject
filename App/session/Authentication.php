<?php


namespace App\session;


class Authentication
{
    public $login;
    public $pass;

    public function auth(string $login, string $pass): bool
    {
        $this->login = $login;
        $this->pass = $pass;
        return true;
    }

    public function isAuth(): bool
    {
        if (!empty($this->login) && !empty($this->pass)) {
            return true;
        } else {
            return false;
        }

    }

    public function getLogin(): string
    {
        if (isset($this->login)) {
            return $this->login;
        }
    }

    public function logOut(): void
    {
        session_abort();

        session_start();
        session_abort();
    }
}