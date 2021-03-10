<?php


namespace App\models;


use App\Services\OrderService;

class Order
{
    public OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService(OrderService::connect());
    }

    public function createAllProductsByIdOrder($product_id, $order_id, $qty)
    {
        return $this->orderService->createAllProductsByIdOrder($product_id, $order_id, $qty);
    }

    public function getAllProductsByIdOrder(int $order_id)
    {
        return $this->orderService->getAllProductsByIdOrder($order_id);
    }

    public function getLastId()
    {
        return $this->orderService->getLastId();
    }

}