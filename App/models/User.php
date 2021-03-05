<?php


namespace App\Models;

use App\Services\OrderService;
use App\Services\UserService;

class User
{

    public BaseModel $baseModel;
    private UserService $userService;
    private OrderService $orderService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->orderService = new OrderService();
        $this->baseModel = new BaseModel();
    }

    public function checkUserExist($email)
    {
        $user = $this->userService->getByEmail($email);
        if (!$user) {
            return false;
        } else {
            return $user;
        }
    }

    public function createUser($name, $surname, $email, $password): bool
    {
        return $this->userService->create($name, $surname, $email, $password);
    }

    public function getName(int $id): string
    {
        $user = $this->userService->getById($id);
        return $user->name;
    }

    public function getUser(int $id)
    {
        return $this->userService->getById($id);
    }

    public function register(string $name, string $surname, string $email, string $password): bool
    {
        return ($this->userService->create($name, $surname, $email, $password));
    }

    public function update(int $id, string $name, string $surname, string $email, string $password): bool
    {
        return ($this->userService->update($id, $name, $surname, $email, $password));
    }

    public function delete(int $id): bool
    {
        return $this->userService->delete($id);
    }

    public function getAllOrdersForUser($order_id, $user_id)
    {
        return $this->userService->getAllOrdersForUser($order_id, $user_id);
    }

    public function makeOrder(int $user_id, $totalPrice, $comments = null)
    {
        $this->orderService->create($user_id, $totalPrice,$comments);
        return true;
    }
}