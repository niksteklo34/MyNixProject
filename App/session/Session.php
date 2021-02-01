<?php

namespace App\session;

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
        if (!empty($_COOKIE)) {
            return true;
        } else {
            return false;
        }
    }

    public function fff() {
        return $_SESSION['name'];
    }

    public function sessionExists(): bool
    {
        if (!empty($_SESSION)) {
            return true;
        } else {
            return false;
        }
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
        return $_SESSION[$key];
    }

    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }
}