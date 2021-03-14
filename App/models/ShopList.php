<?php


namespace App\models;


use App\Services\OrderService;

class ShopList
{
    public OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService(OrderService::connect());
    }

    public function countForUser($user_id)
    {
        return $this->orderService->countForUser($user_id);
    }
}