<?php

use App\Services\UserService;

class CreateUserCest
{
    protected PDO $pdo;
    protected $userService;

    public function _before(UnitTester $I)
    {
        $this->pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $this->userService = new UserService($this->pdo);
    }

    public function tryToInsertUser(UnitTester $I)
    {
        $name = 'User';
        $surname = 'Test';
        $email = 'testEmail@gmail.com';
        $password = password_hash('12345', PASSWORD_BCRYPT);
        $this->userService->create($name, $surname, $email, $password);
        $I->seeInDatabase('user', ['name' => $name, 'surname' => $surname, 'email' => $email, 'password' => $password]);
    }

    public function tryToDeleteUser(UnitTester $I)
    {
        $this->userService->delete(1);
        $I->dontSeeInDatabase('user', ['id' => 1]);
    }

}
