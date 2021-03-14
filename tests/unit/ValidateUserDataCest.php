<?php

use App\Services\UserService;

class ValidateUserDataCest
{
    protected PDO $pdo;
    protected $userModel;

    public function _before(UnitTester $I)
    {
        $this->pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $this->userModel = new UserService($this->pdo);
    }

    public function tryValidateUserName(UnitTester $I)
    {
        $userName = 'Niksteklo';
        $result = $this->userModel->validationUserName($userName);

        $I->assertTrue($result);
    }

    public function tryValidateUserPassword(UnitTester $I)
    {
        $userPassword = '1234567';
        $result = $this->userModel->validationUserPassword($userPassword);

        $I->assertFalse($result);
    }
}
