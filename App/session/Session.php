<?php

namespace App\Session;

class Session
{

    public function getId(): string
    {
        return session_id();
    }

    public function setId($id): void
    {
        session_id($id);
    }

    public function cookieExists(): bool
    {
        return empty($_COOKIE) ? false : true;
    }

    public function sessionExists(): bool
    {
        return empty($_SESSION) ? false : true;
    }

    public function setName($name): void
    {
        session_name($name);
    }

    public function getName(): string
    {
        return session_name();
    }

    public function start(): bool
    {
        return session_start();
    }

    public function destroy(): void
    {
        session_destroy();
    }

    public function set(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function setSavePath($savePath): void
    {
        session_save_path($savePath);
    }

    public function get($key)
    {
        return $_SESSION["$key"];
    }

    public function delete($key): void
    {
        if ($this->sessionExists()) unset($_SESSION[$key]);
    }
}